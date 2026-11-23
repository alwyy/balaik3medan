<?php
/**
 * CLI Helper Script untuk CMS: Refresh Data Instagram
 * Jalankan via terminal atau Cron Job:
 * php scripts/refresh_instagram.php
 */

define('APP_ROOT', dirname(__DIR__));
require_once APP_ROOT . '/config/config.php';
require_once APP_ROOT . '/models/InstagramModel.php';

echo "=== Balai K3 Medan - Instagram Synchronizer ===\n";

$config = InstagramModel::getConfig();
echo "Status API: " . ($config['api_enabled'] ? "AKTIF" : "NON-AKTIF (Menggunakan Fallback)") . "\n";
echo "Akun: " . ($config['handle'] ?? '@balaik3medan') . "\n";

$posts = InstagramModel::getLatestPosts(12);

echo "Berhasil memuat " . count($posts) . " postingan kegiatan terbaru.\n";
foreach ($posts as $i => $post) {
    echo "[" . ($i + 1) . "] " . $post['title'] . " (" . ($post['tag'] ?? 'Instagram') . ")\n";
}

echo "\nProses sinkronisasi selesai.\n";
