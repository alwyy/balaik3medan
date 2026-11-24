<?php
/**
 * Header Layout Template
 * Mengatur Head HTML dan Navigasi Utama dengan URL Tertutup (Clean URL)
 */
?>
<!DOCTYPE html>
<html lang="id" data-type="service">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Balai Keselamatan dan Kesehatan Kerja Medan') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Balai Keselamatan dan Kesehatan Kerja (K3) Medan - Kementerian Ketenagakerjaan RI">
    <meta name="page-type" content="service">
    <meta name="site-kind" content="place">

    <!-- Favicon / Web Icon -->
    <link rel="icon" type="image/png" href="<?= asset('assets/logokemnaker.png') ?>">
    <link rel="shortcut icon" type="image/png" href="<?= asset('assets/logokemnaker.png') ?>">
    <link rel="apple-touch-icon" href="<?= asset('assets/logokemnaker.png') ?>">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="<?= asset('style.css') ?>?v=<?= filemtime(APP_ROOT . '/style.css') ?>">

    <!-- Font Awesome Icons 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts: Montserrat (Title/Heading) & Plus Jakarta Sans / Inter (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Motion.dev (MIT) - Animation Library -->
    <script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js"></script>

    <!-- Anime.js v4 (MIT) - Animation Library -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@4.5.0/dist/bundles/anime.umd.min.js"></script>

    <!-- Chart.js (MIT) - Shadcn-style Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>

    <!-- Leaflet.js (BSD-2-Clause) - Peta Interaktif Wilayah Kerja -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>

    <?php if (!empty($extraHead)) echo $extraHead; ?>
</head>
<body class="<?= empty($isHome) ? 'subpage-body' : 'home-body' ?>">

<!-- TOP SHIMMER PROGRESS BAR -->
<div id="top-shimmer-bar" class="top-shimmer-bar"></div>

<!-- ACCESSIBLE SKIP LINK -->
<a href="#main-content" class="skip-link">Loncat ke konten utama</a>

<!-- NAVBAR -->
<header class="navbar <?= empty($isHome) ? 'scrolled subpage-nav' : '' ?>" id="navbar">
    <div class="container">

        <!-- LOGO -->
        <a href="<?= url('/') ?>" class="logo-area" aria-label="Beranda Balai K3 Medan">
            <img src="<?= asset('assets/logokemnaker.png') ?>" alt="Logo Kemnaker">
            <div class="logo-text">
                <span class="logo-line-1">Balai Keselamatan dan</span>
                <span class="logo-line-2">Kesehatan Kerja Medan</span>
            </div>
        </a>

        <!-- HAMBURGER MENU -->
        <div class="hamburger" id="hamburger" aria-label="Toggle menu navigasi" role="button" tabindex="0">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- NAVIGASI MENU -->
        <nav class="nav-menu" id="navMenu">

            <!-- BERANDA -->
            <a href="<?= url('/') ?>" class="nav-link <?= ($activePage ?? '') === 'home' ? 'active' : '' ?>">Beranda</a>

            <!-- TENTANG KAMI -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn <?= in_array($activePage ?? '', ['about', 'tugas-fungsi', 'struktur']) ? 'active' : '' ?>">Tentang Kami ▾</a>
                <div class="dropdown-menu">
                    <a href="<?= url('/#about') ?>">Profil Balai K3</a>
                    <a href="<?= url('tugas-fungsi') ?>">Tugas &amp; Fungsi</a>
                    <a href="<?= url('struktur') ?>">Struktur Organisasi</a>
                </div>
            </div>

            <!-- PELAYANAN PUBLIK -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn <?= in_array($activePage ?? '', ['maklumat', 'standar', 'jadwal', 'jenis', 'layanan']) ? 'active' : '' ?>">Pelayanan Publik ▾</a>
                <div class="dropdown-menu">
                    <a href="<?= url('maklumat') ?>">Maklumat Pelayanan</a>
                    <a href="<?= url('standar') ?>">Standar Pelayanan</a>
                    <a href="<?= url('jadwal') ?>">Jam Pelayanan</a>
                    <a href="<?= url('jenis') ?>">Jenis Layanan</a>
                </div>
            </div>

            <!-- INFORMASI -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn <?= in_array($activePage ?? '', ['galeri', 'capaian-kinerja']) ? 'active' : '' ?>">Informasi ▾</a>
                <div class="dropdown-menu">
                    <a href="<?= url('galeri') ?>">Galeri Kegiatan</a>
                    <a href="<?= url('capaian-kinerja') ?>">Capaian Kinerja</a>
                </div>
            </div>

            <!-- KONTAK -->
            <a href="<?= url('/#contact') ?>" class="nav-link">Kontak</a>

        </nav>

    </div>
</header>

<!-- MAIN CONTENT WRAPPER -->
<main id="main-content">
