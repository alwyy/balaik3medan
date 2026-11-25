<?php

namespace App\Models;

/**
 * JenisLayananModel
 * Model & Data Access Layer untuk menu Jenis Layanan Balai K3 Medan.
 * Terhubung langsung ke data riil (data/jenis_layanan.json) dan siap menerima input,
 * penyesuaian, penambahan, atau update dari CMS secara dinamis.
 */
class JenisLayananModel
{
    private static function getDataFile()
    {
        return base_path('data/jenis_layanan.json');
    }

    /**
     * Membaca seluruh data layanan dari penyimpanan CMS / JSON
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
     * Mengambil metadata layanan
     */
    public static function getMeta()
    {
        $data = self::getData();
        return $data['meta'] ?? [
            'title' => 'Jenis Layanan K3 – Balai K3 Medan',
            'deskripsi' => 'Layanan teknis pengujian, pemeriksaan kesehatan kerja, pelatihan, dan pendampingan SMK3.',
            'status' => 'Aktif Terverifikasi'
        ];
    }

    /**
     * Mengambil daftar kategori dinamis yang terbentuk dari data layanan
     */
    public static function getCategories()
    {
        $data = self::getData();
        $predefined = $data['kategori_list'] ?? [];
        $services = $data['layanan'] ?? [];

        // Buat map kategori dari layanan yang benar-benar ada
        $categoriesMap = [];
        $categoriesMap['all'] = 'Semua Layanan';

        if (!empty($predefined)) {
            foreach ($predefined as $cat) {
                if (!empty($cat['id']) && !empty($cat['nama'])) {
                    $categoriesMap[$cat['id']] = $cat['nama'];
                }
            }
        }

        // Pastikan setiap kategori yang digunakan oleh layanan terdaftar
        foreach ($services as $srv) {
            $catId = $srv['kategori_id'] ?? 'umum';
            $catName = $srv['kategori_nama'] ?? ucfirst(str_replace('-', ' ', $catId));
            if (!isset($categoriesMap[$catId])) {
                $categoriesMap[$catId] = $catName;
            }
        }

        $result = [];
        foreach ($categoriesMap as $id => $nama) {
            $result[] = [
                'id' => $id,
                'nama' => $nama
            ];
        }

        return $result;
    }

    /**
     * Mengambil daftar layanan dengan opsi filter kategori dan pencarian kata kunci
     */
    public static function getServices($categoryId = null, $keyword = null)
    {
        $data = self::getData();
        $services = $data['layanan'] ?? [];

        if (!empty($categoryId) && $categoryId !== 'all') {
            $services = array_filter($services, function ($item) use ($categoryId) {
                return ($item['kategori_id'] ?? '') === $categoryId;
            });
        }

        if (!empty($keyword)) {
            $kw = mb_strtolower(trim($keyword));
            $services = array_filter($services, function ($item) use ($kw) {
                $searchContent = mb_strtolower(
                    ($item['judul'] ?? '') . ' ' .
                    ($item['ringkasan'] ?? '') . ' ' .
                    ($item['kategori_nama'] ?? '') . ' ' .
                    implode(' ', $item['lingkup_parameter'] ?? [])
                );
                return str_contains($searchContent, $kw);
            });
        }

        return array_values($services);
    }

    /**
     * Mengambil detail satu layanan berdasarkan ID / slug
     */
    public static function getServiceById($id)
    {
        $services = self::getServices();
        foreach ($services as $srv) {
            if (($srv['id'] ?? '') === $id) {
                return $srv;
            }
        }
        return null;
    }

    /**
     * Menyimpan seluruh dataset layanan
     */
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

    /**
     * Method untuk menambah atau mengupdate data layanan dari CMS (CMS Push Hook)
     */
    public static function pushService(array $serviceData)
    {
        $data = self::getData();
        if (!isset($data['layanan'])) {
            $data['layanan'] = [];
        }

        $id = $serviceData['id'] ?? null;
        if (!$id) {
            $id = 'layanan-' . (count($data['layanan']) + 1);
            $serviceData['id'] = $id;
        }

        $foundIndex = -1;
        foreach ($data['layanan'] as $idx => $item) {
            if (($item['id'] ?? '') === $id) {
                $foundIndex = $idx;
                break;
            }
        }

        if ($foundIndex >= 0) {
            $data['layanan'][$foundIndex] = array_merge($data['layanan'][$foundIndex], $serviceData);
        } else {
            $data['layanan'][] = $serviceData;
        }

        return self::saveData($data);
    }

    /**
     * Method untuk menghapus layanan dari CMS
     */
    public static function deleteService($id)
    {
        $data = self::getData();
        if (!isset($data['layanan'])) {
            return false;
        }

        $initialCount = count($data['layanan']);
        $data['layanan'] = array_values(array_filter($data['layanan'], function ($item) use ($id) {
            return ($item['id'] ?? '') !== $id;
        }));

        if (count($data['layanan']) < $initialCount) {
            return self::saveData($data);
        }

        return false;
    }
}
