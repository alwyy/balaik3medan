<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas dan Fungsi – Balai K3</title>
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

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .top-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 60px;
        }

        .top-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        }

        .top-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .top-card p {
            padding: 20px;
            font-weight: 600;
            text-align: center;
            color: #1f4e79;
            margin: 0;
        }

        .page-title {
            text-align: center;
            font-size: 42px;
            color: #1f4e79;
            margin-bottom: 60px;
        }

        .page-title::after {
            content: "";
            width: 160px;
            height: 5px;
            background: linear-gradient(135deg, #1f4e79, #4a78a6);
            display: block;
            margin: 20px auto 0;
            border-radius: 5px;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 450px 1fr;
            gap: 80px;
            align-items: flex-start;
        }

        .image-frame {
            padding: 20px;
            border-radius: 25px;
            background: #fff;
            box-shadow: 0 20px 60px rgba(31,78,121,0.15);
        }

        .image-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .image-grid img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 16px;
            display: block;
        }

        .text-content h2 {
            color: #1f4e79;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .text-content h2::after {
            content: "";
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #1f4e79, #4a78a6);
            display: block;
            margin-top: 8px;
            border-radius: 3px;
        }

        .text-content p {
            font-size: 16px;
            line-height: 1.8;
            max-width: 650px;
            text-align: justify;
        }

        .text-content ul {
            padding-left: 0;
            margin: 0 0 30px 0;
        }

        .text-content li {
            list-style: none;
            position: relative;
            padding-left: 28px;
            margin-bottom: 12px;
        }

        .text-content li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #1f4e79, #4a78a6);
            border-radius: 50%;
        }

        .fungsi-wrapper {
            max-width: 600px;
            margin-top: 20px;
        }

        .fungsi-wrapper ul {
            padding-left: 0;
            margin: 0;
        }

        .fungsi-wrapper li {
            list-style: none;
            position: relative;
            padding-left: 28px;
            margin-bottom: 12px;
        }

        .fungsi-wrapper li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #1f4e79, #4a78a6);
            border-radius: 50%;
        }

        .copyright {
            margin-top: 100px;
            padding-top: 25px;
            text-align: center;
            font-size: 14px;
            color: #888;
            border-top: 2px solid #e1e8f0;
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

        @media (max-width: 600px) {
            .top-cards {
                grid-template-columns: 1fr;
            }

            .content-wrapper {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }
    </style>
</head>

<body>

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

<div class="container">

    <div class="top-cards">
        <div class="top-card">
            <img src="assets/bimbingan teknis.jpg">
            <p>Bimbingan teknis Audit Internal SMK3</p>
        </div>
        <div class="top-card">
            <img src="assets/field trip.jpg">
            <p>Field Trip Mahasiswa/I Universitas Efarina</p>
        </div>
        <div class="top-card">
            <img src="assets/pengujian lingkungan kerja.jpg">
            <p>Pengujian K3 Lingkungan Kerja</p>
        </div>
    </div>

    <h1 class="page-title">Tugas dan Fungsi Balai K3</h1>

    <div class="content-wrapper">

        <div class="image-frame">
            <div class="image-grid">
                <img src="assets/kegiatan k3.jpeg">
                <img src="assets/galeri8.jpeg">
            </div>
        </div>

        <div class="text-content">
            <h2>Tugas</h2>
            <p>Sesuai Pasal 45 Permenaker Nomor 1 Tahun 2022, Balai K3 Medan mempunyai tugas melaksanakan:</p>

            <ul>
                <li>Pengujian keselamatan dan kesehatan kerja</li>
                <li>Peningkatan kapasitas dan uji kompetensi personil K3</li>
                <li>Pemeriksaan kesehatan kerja</li>
                <li>Pelayanan konsultasi K3</li>
                <li>Peningkatan jejaring K3</li>
            </ul>

            <h2>Fungsi</h2>
            <div class="fungsi-wrapper">
                <ul>
                    <li>Penyusunan rencana dan program</li>
                    <li>Analisis dan pengujian K3</li>
                    <li>Peningkatan kapasitas</li>
                    <li>Pemeriksaan kesehatan kerja</li>
                    <li>Konsultasi dan rekomendasi</li>
                    <li>Pengelolaan administrasi</li>
                    <li>Evaluasi dan pelaporan</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="copyright">
        © 2026 Balai Keselamatan dan Kesehatan Kerja Medan
    </div>

</div>

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