<?php
/**
 * CapaianKinerjaModel
 * Model & Service untuk data Sasaran Strategis & Capaian Kinerja Balai K3 Medan
 * Didesain khusus agar ramah CMS (CMS Ready & Extensible)
 * 
 * Fitur:
 * 1. Sumber data fleksibel (data/capaian_kinerja.json) yang dapat di-update langsung oleh CMS Admin
 * 2. Logika otomatis resolusi Logo Perusahaan dari internet (via Domain / Clearbit / Unavatar / Favicon)
 * 3. Fallback jika logo kustom di-override secara manual di CMS
 * 4. Helper data siap pakai untuk Chart.js (Doughnut & Bar Charts)
 * 5. Method simpan data untuk modul CRUD Admin CMS masa depan
 */

class CapaianKinerjaModel {

    private static $dataFile = APP_ROOT . '/data/capaian_kinerja.json';

    /**
     * Mengambil seluruh data capaian kinerja
     * @return array
     */
    public static function getData() {
        if (!file_exists(self::$dataFile)) {
            return [];
        }
        $raw = file_get_contents(self::$dataFile);
        $data = json_decode($raw, true);
        return is_array($data) ? $data : [];
    }

    /**
     * Mengambil Ringkasan Eksekutif
     */
    public static function getSummary() {
        $data = self::getData();
        return $data['ringkasan_eksekutif'] ?? [];
    }

    /**
     * Mengambil KPI Utama
     */
    public static function getKpiUtama() {
        $data = self::getData();
        return $data['kpi_utama'] ?? [];
    }

    /**
     * Mengambil Sasaran Strategis dan Target vs Realisasi
     */
    public static function getSasaranStrategis() {
        $data = self::getData();
        return $data['sasaran_strategis'] ?? [];
    }

    /**
     * Mengambil data sebaran peserta edukasi / webinar
     */
    public static function getSebaranPeserta() {
        $data = self::getData();
        return $data['sebaran_peserta_webinar'] ?? [];
    }

    /**
     * Mengambil daftar perusahaan mitra yang telah diuji lengkap dengan logo URL
     */
    public static function getPerusahaanMitra() {
        $data = self::getData();
        $companies = $data['perusahaan_mitra'] ?? [];

        foreach ($companies as &$company) {
            $company['resolved_logo'] = self::resolveLogoUrl($company);
            $company['initials'] = self::getInitials($company['nama'] ?? 'K3');
        }

        return $companies;
    }

    /**
     * Mengambil tren bulanan
     */
    public static function getTrenBulanan() {
        $data = self::getData();
        return $data['tren_bulanan_2026'] ?? [];
    }

    /**
     * Mengambil sebaran sektor industri perusahaan terlayani
     */
    public static function getSebaranSektor() {
        $data = self::getData();
        return $data['sebaran_sektor_industri'] ?? [];
    }

    /**
     * Resolusi URL Logo Perusahaan Otomatis dari Internet
     * Prioritas:
     * 1. Logo Custom (jika di-upload / diisi manual di CMS)
     * 2. Clearbit Logo API berdasarkan domain resmi (misal: pacmedan.com, prodia.co.id)
     * 3. Fallback via Google Favicon / Unavatar
     */
    public static function resolveLogoUrl($company) {
        // 1. Jika ada logo kustom (in case admin mengedit/memperbaiki logo salah)
        if (!empty($company['logo_custom'])) {
            return $company['logo_custom'];
        }

        // 2. Jika ada nama domain, cari otomatis dari internet via Clearbit / Google S2
        if (!empty($company['domain'])) {
            $domain = trim($company['domain']);
            // Endpoint standar resolusi logo modern
            return 'https://logo.clearbit.com/' . $domain;
        }

        return '';
    }

    /**
     * Menghasilkan inisial nama perusahaan untuk avatar fallback elegan
     */
    public static function getInitials($name) {
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
     * Menyimpan data kembali ke capaian_kinerja.json (untuk fitur CMS Admin)
     */
    public static function saveData(array $data) {
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return file_put_contents(self::$dataFile, $json) !== false;
    }
}
