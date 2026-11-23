<?php
/**
 * Application Entry Point
 * Balai Keselamatan dan Kesehatan Kerja Medan (PHP MVC)
 */

// Muat konfigurasi dasar
require_once __DIR__ . '/config/config.php';

// Muat komponen core MVC
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/App.php';

// Jalankan aplikasi router
$app = new App();
