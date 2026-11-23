<?php
/**
 * Konfigurasi Aplikasi Balai K3 Medan
 * PHP MVC Architecture
 */

// Menentukan root direktori aplikasi
if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__));
}

// Menentukan BASE_URL secara dinamis dan fleksibel
if (!defined('BASE_URL')) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    // Ambil path direktori dari script yang dieksekusi
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $baseDir = rtrim(dirname($scriptName), '/');

    // Jika direktori adalah root '/', kosongkan
    if ($baseDir === '/' || $baseDir === '\\') {
        $baseDir = '';
    }

    define('BASE_URL', $protocol . $host . $baseDir);
}

/**
 * Helper untuk membuat URL tertutup / clean URL
 * Contoh: url('maklumat') -> http://localhost/balaik3medan/maklumat
 */
function url($path = '') {
    $path = ltrim($path, '/');
    return rtrim(BASE_URL, '/') . ($path !== '' ? '/' . $path : '');
}

/**
 * Helper untuk memuat aset publik (css, js, gambar)
 * Contoh: asset('style.css') -> http://localhost/balaik3medan/style.css
 */
function asset($path = '') {
    $path = ltrim($path, '/');
    return rtrim(BASE_URL, '/') . '/' . $path;
}

// Konfigurasi Database (jika diperlukan)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'balaik3medan');
