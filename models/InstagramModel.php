<?php
/**
 * InstagramModel
 * Model & Service untuk integrasi postingan Instagram Balai K3 Medan
 * Didesain khusus agar ramah pengembang CMS (CMS Developer Friendly)
 * 
 * Fitur:
 * 1. Otomatis Caching untuk mencegah pembatasan rate limit API Instagram
 * 2. Fallback aman ke data lokal (data/activities.json) jika API offline / kuota habis
 * 3. Method getLatestPosts(10) untuk konsumsi frontend (Home & Galeri)
 * 4. Method savePosts($posts) siap pakai untuk modul Admin CRUD CMS
 */

class InstagramModel {

    /**
     * Mengambil konfigurasi Instagram
     */
    public static function getConfig() {
        static $config = null;
        if ($config === null) {
            $configFile = APP_ROOT . '/config/instagram.php';
            if (file_exists($configFile)) {
                $config = require $configFile;
            } else {
                $config = [
                    'api_enabled' => false,
                    'access_token' => '',
                    'cache_ttl' => 3600,
                    'cache_file' => APP_ROOT . '/data/instagram_cache.json',
                    'fallback_file' => APP_ROOT . '/data/activities.json',
                    'post_limit' => 10,
                    'rate_limit_safety' => true,
                    'account_url' => 'https://www.instagram.com/balaik3medan',
                    'handle' => '@balaik3medan'
                ];
            }
        }
        return $config;
    }

    /**
     * Mengambil 12 postingan Instagram terbaru
     * Prioritas: Cache Valid -> Instagram API -> Fallback JSON Lokal
     */
    public static function getLatestPosts($limit = 12) {
        $config = self::getConfig();
        $limit = $limit ?: ($config['post_limit'] ?? 12);

        // 1. Cek apakah ada cache yang masih valid
        $cached = self::readCache($config);
        if ($cached !== null && !empty($cached)) {
            return array_slice($cached, 0, $limit);
        }

        // 2. Jika API diaktifkan dan ada token, coba ambil dari API
        if (!empty($config['api_enabled']) && !empty($config['access_token'])) {
            $apiPosts = self::fetchFromInstagramApi($config);
            if ($apiPosts !== null && !empty($apiPosts)) {
                self::writeCache($config, $apiPosts);
                return array_slice($apiPosts, 0, $limit);
            }
        }

        // 3. Fallback: ambil dari file lokal data/activities.json
        $fallback = self::getFallbackPosts($limit);
        return $fallback;
    }

    /**
     * Membaca file cache lokal
     */
    protected static function readCache($config) {
        $cacheFile = $config['cache_file'] ?? (APP_ROOT . '/data/instagram_cache.json');
        $ttl = $config['cache_ttl'] ?? 3600;

        if (file_exists($cacheFile)) {
            $mtime = filemtime($cacheFile);
            if ((time() - $mtime) < $ttl) {
                $content = file_get_contents($cacheFile);
                $json = json_decode($content, true);
                if (is_array($json) && !empty($json)) {
                    return $json;
                }
            }
        }
        return null;
    }

    /**
     * Menyimpan data postingan ke file cache lokal
     */
    protected static function writeCache($config, array $data) {
        $cacheFile = $config['cache_file'] ?? (APP_ROOT . '/data/instagram_cache.json');
        $dir = dirname($cacheFile);
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return @file_put_contents($cacheFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) !== false;
    }

    /**
     * Memanggil Instagram Graph API / Basic Display API
     * Dilengkapi proteksi Timeout dan Rate Limiting (HTTP 429)
     */
    protected static function fetchFromInstagramApi($config) {
        $token = $config['access_token'];
        $limit = $config['post_limit'] ?? 10;
        $url = "https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink,thumbnail_url,timestamp&limit={$limit}&access_token={$token}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6); // Timeout singkat agar web tidak lambat jika API lambat
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        // Jika kena rate limit (HTTP 429) atau gagal koneksi, return null untuk trigger fallback
        if ($httpCode === 429 || $httpCode !== 200 || empty($response)) {
            error_log("[Instagram API] Request gagal / Rate Limit tercapai. HTTP Code: {$httpCode}. Error: {$curlError}");
            return null;
        }

        $result = json_decode($response, true);
        if (!isset($result['data']) || !is_array($result['data'])) {
            return null;
        }

        // Normalisasi format data dari API agar cocok dengan frontend card
        $normalized = [];
        $idx = 1;
        foreach ($result['data'] as $item) {
            $imageUrl = $item['media_url'] ?? ($item['thumbnail_url'] ?? 'assets/activities/post_1.jpg');
            $caption = $item['caption'] ?? '';
            $lines = explode("\n", trim($caption));
            $title = !empty($lines[0]) ? mb_substr($lines[0], 0, 48) : 'Kegiatan K3 Balai K3 Medan';

            $normalized[] = [
                'id' => $item['id'] ?? $idx,
                'image' => $imageUrl,
                'tag' => 'Instagram Post',
                'title' => $title,
                'caption' => mb_substr($caption, 0, 120) . (mb_strlen($caption) > 120 ? '...' : ''),
                'date' => isset($item['timestamp']) ? date('d M Y', strtotime($item['timestamp'])) : 'Terbaru',
                'url' => $item['permalink'] ?? ($config['account_url'] ?? 'https://www.instagram.com/balaik3medan')
            ];
            $idx++;
        }

        return $normalized;
    }

    /**
     * Membaca postingan cadangan dari data/activities.json
     */
    public static function getFallbackPosts($limit = 12) {
        $file = APP_ROOT . '/data/activities.json';
        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);
            if (is_array($data)) {
                return array_slice($data, 0, $limit);
            }
        }
        return [];
    }

    /**
     * Method untuk Modul CMS: Menyimpan atau memperbarui daftar postingan
     */
    public static function savePosts(array $posts) {
        $file = APP_ROOT . '/data/activities.json';
        $dir = dirname($file);
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) !== false;
    }

    /**
     * Data profil Instagram Balai K3 Medan
     */
    public static function getProfile() {
        return [
            'username' => 'balaik3medan',
            'handle' => '@balaik3medan',
            'name' => 'Balai K3 Medan',
            'badge' => 'Unit Pelaksana Teknis Kemnaker RI',
            'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw==',
            'avatar' => 'assets/kemnaker.png'
        ];
    }
}
