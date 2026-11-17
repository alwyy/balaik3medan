<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Galeri Kegiatan – Balai K3 Medan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background: #f4f7fb;
        color: #333;
        line-height: 1.6;
        padding-top: 80px;
    }

    /* ===== NAVBAR ===== */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background: #003366;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-inner {
        width: 90%;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
    }

    .logo-area {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
    }

    .logo-area img {
        width: 72px;
    }

    .logo-text span {
        display: block;
        font-size: 14px;
    }

    .logo-text .small {
        font-size: 12px;
        opacity: 0.9;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 22px;
    }

    .nav-menu a {
        text-decoration: none;
        color: white;
        font-weight: 500;
        font-size: 15px;
        transition: opacity 0.3s ease;
    }

    .nav-menu a:hover {
        opacity: 0.6;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 38px;
        left: 0;
        min-width: 220px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        padding: 8px 0;
        z-index: 999;
    }

    .dropdown-menu a {
        display: block;
        padding: 12px 18px;
        color: #003366;
        font-size: 14px;
        text-decoration: none;
    }

    .dropdown-menu a:hover {
        background: #f1f5f9;
    }

    .dropdown.active .dropdown-menu {
        display: block;
    }

    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
    }

    .hamburger span {
        width: 26px;
        height: 3px;
        background: white;
        margin: 4px 0;
        border-radius: 3px;
        transition: 0.3s;
    }

    /* ===== GALLERY ===== */
    .gallery-section {
        padding: 80px 20px;
        background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
        color: #333;
    }

    .gallery-section h2 {
        text-align: center;
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #003366;
    }

    .gallery-section p {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 60px;
        font-size: 17px;
        color: #666;
    }

    .gallery-grid {
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .gallery-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .gallery-media {
        overflow: hidden;
        background: #f0f0f0;
        position: relative;
    }

    .gallery-media img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .gallery-card:hover .gallery-media img {
        transform: scale(1.05);
    }

    .gallery-media iframe {
        width: 100%;
        height: 240px;
        border: none;
    }

    .gallery-label {
        padding: 20px;
        font-size: 15px;
        font-weight: 600;
        text-align: center;
        color: #333;
        line-height: 1.5;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .hamburger {
            display: flex;
        }

        .nav-menu {
            position: absolute;
            top: 70px;
            right: 0;
            width: 100%;
            background: #003366;
            flex-direction: column;
            display: none;
            padding: 20px 0;
        }

        .nav-menu.active {
            display: flex;
        }

        .dropdown-menu {
            position: static;
            background: #004080;
            box-shadow: none;
        }

        .dropdown-menu a {
            color: white;
        }

        body {
            padding-top: 100px;
        }
    }
</style>

    <!-- Motion.dev (MIT) - Animation Library -->
    <script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js"></script>

    <!-- Anime.js v4 (MIT) - Animation Library -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@4.5.0/dist/bundles/anime.umd.min.js"></script>

    <!-- Chart.js (MIT) - Shadcn-style Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
</head>

<body>

<!-- NAVBAR -->
<header class="navbar" id="navbar">
    <div class="navbar-inner">

        <div class="logo-area">
            <img src="assets/logokemnaker.png" alt="Logo KEMNAKER">
            <div class="logo-text">
                <span>Balai</span>
                <span>Keselamatan dan Kesehatan Kerja</span>
                <span class="small">Medan</span>
            </div>
        </div>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav class="nav-menu" id="navMenu">
            <a href="index.php" class="nav-link">Beranda</a>

            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">Profile ▾</a>
                <div class="dropdown-menu">
                    <a href="index.php#about">Profile Balai K3</a>
                    <a href="tugas-fungsi.php">Tugas & Fungsi</a>
                    <a href="struktur.php">Struktur Organisasi</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">Pelayanan Publik ▾</a>
                <div class="dropdown-menu">
                    <a href="maklumat.php">Maklumat Pelayanan</a>
                    <a href="standar.php">Standar Pelayanan</a>
                    <a href="jadwal.php">Jam Pelayanan</a>
                    <a href="jenis.php">Jenis Layanan</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">About ▾</a>
                <div class="dropdown-menu">
                    <a href="galeri.php">Galeri Kegiatan</a>
                </div>
            </div>

            <a href="index.php#contact" class="nav-link">Contact</a>
        </nav>

    </div>
</header>
<!-- END NAVBAR -->

<!-- GALLERY CONTENT -->
<section class="gallery-section">

    <h2>Galeri Kegiatan</h2>
    <p>Dokumentasi kegiatan Balai Keselamatan dan Kesehatan Kerja Medan</p>

    <div class="gallery-grid">

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/WhatsApp Image 2026-03-13 at 9.09.45 AM.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Sosialisasi Manajemen Risiko di PRAMITA LAB</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/SMK3.jpg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Sosialisasi SMK3 Di PT. GOLD COIN INDONESIA</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/pameran alat uji.jpg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Pameran Alat Uji K3 & Pemeriksaan Bulan K3 Nasional di PT. Agro Raya Mas - Medan</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/galeri1.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Hari Ayam dan Telur Nasional dan Hari Telur Sedunia 2025</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/galeri2.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Rapat Pembahasan Program Kerja</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/galeri3.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Pemeriksaan Kesehatan Internal</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/galeri4.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Sepekan Balai Pelatihan</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/galeri9.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Kegiatan Workshop</div>
        </div>

        <div class="gallery-card">
            <div class="gallery-media">
                <img src="assets/galeri10.jpeg" alt="Kegiatan K3">
            </div>
            <div class="gallery-label">Pendampingan Teknis</div>
        </div>

    </div>

</section>

<script>
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
});

const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const dropBtn = dropdown.querySelector('.drop-btn');

    dropBtn.addEventListener('click', (e) => {
        e.preventDefault();

        dropdowns.forEach(d => {
            if (d !== dropdown) {
                d.classList.remove('active');
            }
        });

        dropdown.classList.toggle('active');
    });
});

document.addEventListener('click', (e) => {
    if (!e.target.closest('.dropdown')) {
        dropdowns.forEach(d => {
            d.classList.remove('active');
        });
    }
});
</script>

</body>
</html>