<?php
/**
 * Konfigurasi Integrasi Instagram API & CMS Balai K3 Medan
 * 
 * PANDUAN PENTING UNTUK DEVELOPER CMS:
 * 1. PEMBATASAN API (RATE LIMITING):
 *    Instagram Graph API membatasi request maksimal ~200 panggilan per jam per user.
 *    Jangan pernah memanggil API langsung di setiap pageview pengunjung!
 *    Gunakan mekanisme cache ('cache_ttl' default: 3600 detik / 1 jam).
 * 
 * 2. FALLBACK SAFETY:
 *    Jika 'api_enabled' bernilai false, atau kuota API tercapai (HTTP 429),
 *    atau token kedaluwarsa, sistem otomatis membaca data lokal di 'fallback_file'.
 * 
 * 3. SEBELUM PUSH KE SERVER / REPOSITORY:
 *    - Jangan commit Access Token rahasia ke public repository.
 *    - Pastikan direktori 'data/' memiliki permission write (0755/0775).
 */

return [
    // Toggle integrasi API: set true jika token API Instagram sudah siap
    'api_enabled' => false,

    // Kredensial Meta Instagram Basic Display / Graph API
    'access_token' => getenv('INSTAGRAM_ACCESS_TOKEN') ?: '',
    'user_id'      => getenv('INSTAGRAM_USER_ID') ?: '',

    // Informasi Akun Resmi Balai K3 Medan
    'username'     => 'balaik3medan',
    'handle'       => '@balaik3medan',
    'account_url'  => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw==',

    // Durasi Cache (dalam detik) untuk mencegah pembatasan kuota API (Rate Limit)
    // 3600 detik = 1 jam | 86400 detik = 24 jam
    'cache_ttl'    => 3600,

    // Lokasi File Cache & Fallback
    'cache_file'   => APP_ROOT . '/data/instagram_cache.json',
    'fallback_file'=> APP_ROOT . '/data/activities.json',

    // Jumlah postingan terbaru yang diambil dan ditampilkan
    'post_limit'   => 12,

    // Proteksi Rate Limiting: Otomatis pakai data cadangan jika HTTP 429 (Too Many Requests)
    'rate_limit_safety' => true,
];
