<?php

namespace App\Models;

/**
 * CapaianKinerjaModel
 * Model & Service untuk data Sasaran Strategis & Capaian Kinerja Balai K3 Medan
 * Mendukung input dinamis CMS untuk Laporan Bulanan (Monthly Report) & Laporan Tahunan (Yearly Report).
 */
class CapaianKinerjaModel
{
    private static function getDataFile()
    {
        return base_path('data/capaian_kinerja.json');
    }

    /**
     * Mengambil seluruh data capaian kinerja dari penyimpanan CMS / JSON
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
     * Mengambil konfigurasi daftar menu periode (bulan & tahun)
     */
    public static function getPeriodeMenu()
    {
        $data = self::getData();
        return $data['periode_menu'] ?? [
            'tipe_default' => 'bulanan',
            'tahun_default' => 2026,
            'bulan_default' => '01',
            'daftar_tahun' => [2026, 2025],
            'daftar_bulan' => []
        ];
    }

    /**
     * Mengambil data laporan spesifik berdasarkan tipe (bulanan/tahunan), tahun, dan bulan
     */
    public static function getReportData($tipe = 'bulanan', $tahun = 2026, $bulan = '01')
    {
        $data = self::getData();

        if ($tipe === 'tahunan') {
            $yearKey = (string)$tahun;
            if (isset($data['laporan_tahunan'][$yearKey])) {
                $report = $data['laporan_tahunan'][$yearKey];
                return self::hydrateReport($report);
            }
            // Fallback ke tahun pertama yang tersedia jika key tidak ditemukan
            $firstYear = array_key_first($data['laporan_tahunan'] ?? []);
            if ($firstYear && isset($data['laporan_tahunan'][$firstYear])) {
                return self::hydrateReport($data['laporan_tahunan'][$firstYear]);
            }
        } else {
            // Laporan Bulanan
            $monthKey = sprintf('%s-%02d', $tahun, (int)$bulan);
            if (isset($data['laporan_bulanan'][$monthKey])) {
                $report = $data['laporan_bulanan'][$monthKey];
                return self::hydrateReport($report);
            }
            // Fallback ke bulan pertama yang ada
            $firstMonth = array_key_first($data['laporan_bulanan'] ?? []);
            if ($firstMonth && isset($data['laporan_bulanan'][$firstMonth])) {
                return self::hydrateReport($data['laporan_bulanan'][$firstMonth]);
            }
        }

        // Default fallback ke struktur root
        return self::hydrateReport($data);
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
     * Seluruh dataset laporan bulanan & tahunan (untuk CMS & Client-side Instant Filter)
     */
    public static function getAllReportsBundle()
    {
        $data = self::getData();
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
            'periode_menu' => self::getPeriodeMenu(),
            'bulanan' => $bulanan,
            'tahunan' => $tahunan
        ];
    }

    public static function getSummary()
    {
        $data = self::getData();
        return $data['ringkasan_eksekutif'] ?? [];
    }

    public static function getKpiUtama()
    {
        $data = self::getData();
        return $data['kpi_utama'] ?? [];
    }

    public static function getSasaranStrategis()
    {
        $data = self::getData();
        return $data['sasaran_strategis'] ?? [];
    }

    public static function getSebaranPeserta()
    {
        $data = self::getData();
        return $data['sebaran_peserta_webinar'] ?? [];
    }

    public static function getPerusahaanMitra()
    {
        $data = self::getData();
        $companies = $data['perusahaan_mitra'] ?? [];

        foreach ($companies as &$company) {
            $company['resolved_logo'] = self::resolveLogoUrl($company);
            $company['initials'] = self::getInitials($company['nama'] ?? 'K3');
        }

        return $companies;
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
