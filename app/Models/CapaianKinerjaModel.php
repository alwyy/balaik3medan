<?php

namespace App\Models;

/**
 * CapaianKinerjaModel
 * Model & Data Access Layer untuk Sasaran Strategis & Capaian Kinerja Balai K3 Medan.
 * Murni membaca data riil dari CMS/JSON tanpa data dummy.
 * Otomatis mendeteksi, menghubungkan, dan merender opsi baru ketika data dipush dari CMS.
 */
class CapaianKinerjaModel
{
    private static $namaBulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    private static function getDataFile()
    {
        return base_path('data/capaian_kinerja.json');
    }

    /**
     * Membaca file data riil
     */
    public static function getData()
    {
        $file = self::getDataFile();
        if (!file_exists($file)) {
            return [];
        }
        $raw = file_get_contents($file);
        $data = json_decode($raw, true);
        return is_array($data) ? $data : [];
    }

    /**
     * Menganalisis data yang tersedia untuk menghasilkan opsi menu secara dinamis
     */
    public static function getDynamicOptions()
    {
        $data = self::getData();
        $bulanan = $data['laporan_bulanan'] ?? [];
        $tahunan = $data['laporan_tahunan'] ?? [];

        // Deteksi tahun & bulan dari laporan bulanan yang benar-benar ada
        $monthlyYears = [];
        $monthlyMap = []; // [2026 => ['01' => 'Januari', ...]]

        foreach ($bulanan as $key => $rep) {
            $thn = (int)($rep['tahun'] ?? substr($key, 0, 4));
            $bln = sprintf('%02d', (int)($rep['bulan'] ?? substr($key, 5, 2)));

            if (!in_array($thn, $monthlyYears)) {
                $monthlyYears[] = $thn;
            }

            if (!isset($monthlyMap[$thn])) {
                $monthlyMap[$thn] = [];
            }

            $namaBln = self::$namaBulan[$bln] ?? 'Bulan ' . $bln;
            $monthlyMap[$thn][$bln] = [
                'id' => $bln,
                'nama' => $namaBln,
                'singkat' => mb_substr($namaBln, 0, 3),
                'periode_label' => $rep['periode_label'] ?? ($namaBln . ' ' . $thn)
            ];
        }

        // Urutkan tahun dan bulan
        rsort($monthlyYears);
        foreach ($monthlyMap as $y => &$mList) {
            ksort($mList);
        }

        // Deteksi tahun dari laporan tahunan yang benar-benar ada
        $yearlyYears = [];
        $yearlyMap = [];

        foreach ($tahunan as $key => $rep) {
            $thn = (int)($rep['tahun'] ?? $key);
            if (!in_array($thn, $yearlyYears)) {
                $yearlyYears[] = $thn;
            }
            $yearlyMap[$thn] = [
                'tahun' => $thn,
                'periode_label' => $rep['periode_label'] ?? ('Tahun ' . $thn)
            ];
        }
        rsort($yearlyYears);

        return [
            'has_monthly' => !empty($bulanan),
            'has_yearly' => !empty($tahunan),
            'monthly_count' => count($bulanan),
            'yearly_count' => count($tahunan),
            'monthly_years' => $monthlyYears,
            'monthly_map' => $monthlyMap,
            'yearly_years' => $yearlyYears,
            'yearly_map' => $yearlyMap,
            'default_tipe' => !empty($bulanan) ? 'bulanan' : (!empty($tahunan) ? 'tahunan' : 'bulanan'),
            'default_tahun' => $monthlyYears[0] ?? ($yearlyYears[0] ?? (int)date('Y')),
            'default_bulan' => !empty($monthlyYears) && isset($monthlyMap[$monthlyYears[0]]) ? array_key_first($monthlyMap[$monthlyYears[0]]) : '01'
        ];
    }

    /**
     * Mengambil satu laporan spesifik berdasarkan parameter
     * Mengembalikan null jika belum ada data yang dipush untuk periode tersebut
     */
    public static function getReportData($tipe = 'bulanan', $tahun = null, $bulan = null)
    {
        $data = self::getData();
        $options = self::getDynamicOptions();

        if ($tipe === 'tahunan') {
            $tahunan = $data['laporan_tahunan'] ?? [];
            if (empty($tahunan)) {
                return null;
            }

            $thnKey = (string)($tahun ?: ($options['yearly_years'][0] ?? ''));
            if (isset($tahunan[$thnKey])) {
                return self::hydrateReport($tahunan[$thnKey]);
            }

            // Ambil tahun pertama yang ada jika tahun yang diminta belum tersedia
            $firstYear = array_key_first($tahunan);
            return $firstYear ? self::hydrateReport($tahunan[$firstYear]) : null;
        }

        // Laporan Bulanan
        $bulanan = $data['laporan_bulanan'] ?? [];
        if (empty($bulanan)) {
            return null;
        }

        $thn = $tahun ?: ($options['monthly_years'][0] ?? (int)date('Y'));
        $bln = $bulan ? sprintf('%02d', (int)$bulan) : ($options['default_bulan'] ?? '01');
        $key = sprintf('%s-%s', $thn, $bln);

        if (isset($bulanan[$key])) {
            return self::hydrateReport($bulanan[$key]);
        }

        // Jika bulan tersebut belum dipush, cari bulan lain pada tahun yang sama
        if (isset($options['monthly_map'][$thn]) && !empty($options['monthly_map'][$thn])) {
            $altMonth = array_key_first($options['monthly_map'][$thn]);
            $altKey = sprintf('%s-%s', $thn, $altMonth);
            if (isset($bulanan[$altKey])) {
                return self::hydrateReport($bulanan[$altKey]);
            }
        }

        // Ambil laporan pertama yang ada
        $firstKey = array_key_first($bulanan);
        return $firstKey ? self::hydrateReport($bulanan[$firstKey]) : null;
    }

    /**
     * Mempersiapkan data laporan (resolusi logo perusahaan dan inisial)
     */
    private static function hydrateReport(array $report)
    {
        if (isset($report['perusahaan_mitra']) && is_array($report['perusahaan_mitra'])) {
            foreach ($report['perusahaan_mitra'] as &$company) {
                $company['resolved_logo'] = self::resolveLogoUrl($company);
                $company['initials'] = self::getInitials($company['nama'] ?? 'K3');
            }
        }
        return $report;
    }

    /**
     * Paket data untuk binding JavaScript client-side (bebas data dummy)
     */
    public static function getAllReportsBundle()
    {
        $data = self::getData();
        $options = self::getDynamicOptions();

        $bulanan = $data['laporan_bulanan'] ?? [];
        $tahunan = $data['laporan_tahunan'] ?? [];

        foreach ($bulanan as &$rep) {
            $rep = self::hydrateReport($rep);
        }
        foreach ($tahunan as &$rep) {
            $rep = self::hydrateReport($rep);
        }

        return [
            'meta' => $data['meta'] ?? [],
            'options' => $options,
            'bulanan' => $bulanan,
            'tahunan' => $tahunan
        ];
    }

    public static function resolveLogoUrl($company)
    {
        if (!empty($company['logo_custom'])) {
            return $company['logo_custom'];
        }

        if (!empty($company['domain'])) {
            $domain = trim($company['domain']);
            return 'https://logo.clearbit.com/' . $domain;
        }

        return '';
    }

    public static function getInitials($name)
    {
        $name = preg_replace('/^(PT|CV|UD|PD|Koperasi)\s+/i', '', trim($name));
        $words = preg_split('/\s+/', $name);
        $initials = '';
        foreach ($words as $w) {
            if (!empty($w)) {
                $initials .= strtoupper(mb_substr($w, 0, 1));
            }
            if (strlen($initials) >= 3) break;
        }
        return $initials ?: 'K3';
    }

    /**
     * Method untuk menerima data yang dipush dari CMS
     */
    public static function pushReport($tipe, $key, array $reportData)
    {
        $data = self::getData();
        if ($tipe === 'tahunan') {
            if (!isset($data['laporan_tahunan'])) $data['laporan_tahunan'] = [];
            $data['laporan_tahunan'][(string)$key] = $reportData;
        } else {
            if (!isset($data['laporan_bulanan'])) $data['laporan_bulanan'] = [];
            $data['laporan_bulanan'][(string)$key] = $reportData;
        }
        return self::saveData($data);
    }

    public static function saveData(array $data)
    {
        $file = self::getDataFile();
        $dir = dirname($file);
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return file_put_contents($file, $json) !== false;
    }
}
