<!DOCTYPE html>
<html lang="id" data-type="service">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Balai Keselamatan dan Kesehatan Kerja Medan' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, viewport-fit=cover">
    <meta name="description" content="Website Resmi Balai Keselamatan dan Kesehatan Kerja (K3) Medan - Kementerian Ketenagakerjaan RI">
    <meta name="page-type" content="service">
    <meta name="site-kind" content="place">

    <!-- Anti Dark Reader / Viewport Rendering Safeguards -->
    <meta name="color-scheme" content="light">
    <meta name="darkreader-lock" content="true">

    <!-- Favicon / Web Icon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logokemnaker.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logokemnaker.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/logokemnaker.png') }}">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ file_exists(public_path('style.css')) ? filemtime(public_path('style.css')) : time() }}">

    <!-- Font Awesome Icons 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts: Montserrat & Plus Jakarta Sans / Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- GSAP 3.12.5 & ScrollTrigger (GreenSock) -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <!-- Lenis Smooth Scroll 1.1.20 (Darkroom Engineering) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lenis@1.1.20/dist/lenis.css">
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.20/dist/lenis.min.js"></script>

    <!-- Motion.dev (MIT) - Animation Library -->
    <script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js"></script>

    <!-- Anime.js v4 (MIT) - Animation Library -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@4.5.0/dist/bundles/anime.umd.min.js"></script>

    <!-- Chart.js (MIT) - Shadcn-style Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>

    <!-- Leaflet.js (BSD-2-Clause) - Peta Interaktif Wilayah Kerja -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        :root {
            color-scheme: light;
        }
        html, body {
            background-color: var(--color-bg, #f8fafc) !important;
            color-scheme: light;
            min-height: 100vh;
            width: 100%;
        }
    </style>

    @yield('extraHead')
</head>
<body class="{{ empty($isHome) ? 'subpage-body' : 'home-body' }}">

<!-- TOP SHIMMER PROGRESS BAR -->
<div id="top-shimmer-bar" class="top-shimmer-bar"></div>

<!-- ACCESSIBLE SKIP LINK -->
<a href="#main-content" class="skip-link">Loncat ke konten utama</a>

<!-- NAVBAR -->
<header class="navbar {{ empty($isHome) ? 'scrolled subpage-nav' : '' }}" id="navbar" role="banner">
    <div class="container">

        <!-- LOGO -->
        <a href="{{ url('/') }}" class="logo-area" aria-label="Beranda Balai K3 Medan">
            <img src="{{ asset('assets/logokemnaker.png') }}" alt="Logo Kemnaker">
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
        <nav class="nav-menu" id="navMenu" role="navigation" aria-label="Menu Utama">

            <!-- BERANDA -->
            <a href="{{ url('/') }}" class="nav-link {{ ($activePage ?? '') === 'home' ? 'active' : '' }}">Beranda</a>

            <!-- TENTANG KAMI -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn {{ in_array($activePage ?? '', ['about', 'tugas-fungsi', 'struktur']) ? 'active' : '' }}">Tentang Kami ▾</a>
                <div class="dropdown-menu">
                    <a href="{{ url('/#about') }}">Profil Balai K3</a>
                    <a href="{{ url('tugas-fungsi') }}">Tugas &amp; Fungsi</a>
                    <a href="{{ url('struktur') }}">Struktur Organisasi</a>
                </div>
            </div>

            <!-- PELAYANAN PUBLIK -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn {{ in_array($activePage ?? '', ['maklumat', 'standar', 'jadwal', 'jenis', 'layanan']) ? 'active' : '' }}">Pelayanan Publik ▾</a>
                <div class="dropdown-menu">
                    <a href="{{ url('maklumat') }}">Maklumat Pelayanan</a>
                    <a href="{{ url('standar') }}">Standar Pelayanan</a>
                    <a href="{{ url('jadwal') }}">Jam Pelayanan</a>
                    <a href="{{ url('jenis') }}">Jenis Layanan</a>
                </div>
            </div>

            <!-- INFORMASI -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn {{ in_array($activePage ?? '', ['galeri', 'capaian-kinerja']) ? 'active' : '' }}">Informasi ▾</a>
                <div class="dropdown-menu">
                    <a href="{{ url('galeri') }}">Galeri Kegiatan</a>
                    <a href="{{ url('capaian-kinerja') }}">Capaian Kinerja</a>
                </div>
            </div>

            <!-- KONTAK -->
            <a href="{{ url('/#contact') }}" class="nav-link">Kontak</a>

        </nav>

    </div>
</header>

<!-- MAIN CONTENT WRAPPER -->
<main id="main-content" role="main">
    @yield('content')
</main>

<!-- FOOTER RESMI BALAI K3 MEDAN -->
<footer class="site-footer {{ empty($isHome) ? 'subpage-footer' : 'home-footer' }}" role="contentinfo">
    @if(empty($isHome))
    <!-- KONTEN FOOTER LENGKAP UNTUK SEMUA SUB MENU -->
    <div class="footer-main">
        <div class="container footer-container">

            <!-- KOLOM 1: IDENTITAS INSTANSI -->
            <div class="footer-col footer-col-brand">
                <div class="footer-brand-header">
                    <img src="{{ asset('assets/logokemnaker.png') }}" alt="Kemnaker RI" class="footer-logo">
                    <div class="footer-brand-title">
                        <span class="footer-title-1">Balai Keselamatan dan</span>
                        <span class="footer-title-2">Kesehatan Kerja Medan</span>
                    </div>
                </div>
                <p class="footer-desc">
                    Unit Pelaksana Teknis (UPT) Pusat di bawah Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan dan Keselamatan dan Kesehatan Kerja, Kementerian Ketenagakerjaan Republik Indonesia.
                </p>
                <div class="footer-motto-badge">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span>Keselamatan &amp; Kesehatan Kerja Adalah Prioritas Kami</span>
                </div>
            </div>

            <!-- KOLOM 2: TAUTAN CEPAT & LAYANAN -->
            <div class="footer-col footer-col-links">
                <h4 class="footer-heading">Navigasi Utama</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/#about') }}">Profil Balai K3</a></li>
                    <li><a href="{{ url('tugas-fungsi') }}">Tugas &amp; Fungsi</a></li>
                    <li><a href="{{ url('struktur') }}">Struktur Organisasi</a></li>
                    <li><a href="{{ url('maklumat') }}">Maklumat Pelayanan</a></li>
                    <li><a href="{{ url('standar') }}">Standar Pelayanan</a></li>
                    <li><a href="{{ url('jadwal') }}">Jam Pelayanan</a></li>
                    <li><a href="{{ url('jenis') }}">Jenis Layanan K3</a></li>
                    <li><a href="{{ url('galeri') }}">Galeri Kegiatan</a></li>
                    <li><a href="{{ url('capaian-kinerja') }}">Capaian Kinerja</a></li>
                </ul>
            </div>

            <!-- KOLOM 3: KONTAK & JAM LAYANAN -->
            <div class="footer-col footer-col-contact">
                <h4 class="footer-heading">Kontak &amp; Layanan</h4>
                <ul class="footer-contact-list">
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </span>
                        <p>Jl. KL. Yos Sudarso No.64, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242</p>
                    </li>
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <p>(061) 6850613</p>
                    </li>
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </span>
                        <p>balaik3medan@gmail.com</p>
                    </li>
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </span>
                        <div>
                            <strong>Jam Pelayanan:</strong>
                            <p style="margin:2px 0 0 0;">Senin – Kamis: 07.30 – 16.00 WIB<br>Jumat: 07.30 – 16.30 WIB</p>
                        </div>
                    </li>
                </ul>

                <a href="https://bit.ly/Pengaduan_BK3Medan" target="_blank" rel="noopener noreferrer" class="footer-pengaduan-btn">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    <span>Layanan Pengaduan Online</span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 17l9.2-9.2M17 17V8H8"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
    @endif

    <!-- COPYRIGHT BAR (MUNCUL DI SEMUA SUB MENU & HOME) -->
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>&copy; {{ date('Y') }} Balai Keselamatan dan Kesehatan Kerja Medan &mdash; Kementerian Ketenagakerjaan RI. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>

<!-- FLOATING ACTION (WHATSAPP) -->
<a href="https://wa.me/6285262229195" target="_blank" rel="noopener noreferrer" id="wa-float" aria-label="Hubungi via WhatsApp">
    <img src="{{ asset('assets/wa.png') }}" alt="WhatsApp">
</a>

<!-- SCROLL KE ATAS -->
<button id="scrollTop" aria-label="Kembali ke atas">↑</button>

<!-- SCRIPT UTAMA -->
<script src="{{ asset('script.js') }}?v={{ file_exists(public_path('script.js')) ? filemtime(public_path('script.js')) : time() }}"></script>

@yield('extraScripts')
</body>
</html>
