<?php

namespace App\Models;

/**
 * CapaianKinerjaModel
 * Model & Service untuk data Sasaran Strategis & Capaian Kinerja Balai K3 Medan
 */
class CapaianKinerjaModel
{
    private static function getDataFile()
    {
        return base_path('data/capaian_kinerja.json');
    }

    /**
     * Mengambil seluruh data capaian kinerja
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

    public static function getTrenBulanan()
    {
        $data = self::getData();
        return $data['tren_bulanan_2026'] ?? [];
    }

    public static function getSebaranSektor()
    {
        $data = self::getData();
        return $data['sebaran_sektor_industri'] ?? [];
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
