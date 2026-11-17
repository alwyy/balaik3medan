<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KEMNAKER MEDAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

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
    <div class="container">

        <!-- LOGO -->
        <div class="logo-area">
            <img src="assets/logokemnaker.png" alt="Logo KEMNAKER">
            <div class="logo-text">
                <span>Balai</span>
                <span>Keselamatan dan Kesehatan Kerja</span>
                <span class="small">Medan</span>
            </div>
        </div>

        <!-- HAMBURGER -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- MENU -->
        <nav class="nav-menu" id="navMenu">

            <!-- BERANDA -->
            <a href="#home" class="nav-link active">Beranda</a>

            <!-- PROFILE -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">Profile ▾</a>
                <div class="dropdown-menu">
                    <a href="#about">Profile Balai K3</a>
                    <a href="tugas-fungsi.php">Tugas & Fungsi</a>
                    <a href="struktur.php">Struktur Organisasi</a>
                </div>
            </div>

            <!-- PELAYANAN PUBLIK -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">Pelayanan Publik ▾</a>
                <div class="dropdown-menu">
                    <a href="maklumat.php">Maklumat Pelayanan</a>
                    <a href="standar.php">Standar Pelayanan</a>
                    <a href="jadwal.php">Jam Pelayanan</a>
                    <a href="jenis.php">Jenis Layanan</a>
                </div>
            </div>

            <!-- ABOUT -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">About ▾</a>
                <div class="dropdown-menu">
                    <a href="galeri.php">Galeri Kegiatan</a>
                </div>
            </div>

            <!-- CONTACT -->
            <a href="#contact" class="nav-link">Contact</a>

        </nav>

    </div>
</header>


<!-- HOME -->
<section class="home" id="home">
    <div class="slider" id="slider">
        <div class="slide active" style="background-image:url('assets/gambar 4.jpeg')"></div>
        <div class="slide" style="background-image:url('assets/bimbingan teknis.jpg')"></div>
        <div class="slide" style="background-image:url('assets/overlay.jpg')"></div>
    </div>

    <!-- OVERLAY -->
    <div class="hero-overlay"></div>

    <!-- TEXT -->
    <div class="home-text modern">
        <h1>Selamat Datang di Situs Resmi</h1>
        <h2>Balai K3 Medan</h2>
        <p>Kecepatan, Akurasi, Ketepatan, dan Akuntabel dalam Pelayanan K3</p>
    </div>
</section>

<!-- CARD LAYANAN -->
<section class="services" id="services">

    <div class="service-card">
        <div class="icon-circle">⚕</div>
        <h3>Kegiatan Layanan K3</h3>
        <p>
            Paket pelatihan K3 bagi tenaga medis, paramedis,
            dan industri dengan sertifikasi resmi.
        </p>
        <a href="layanan.php">Lihat</a>
    </div>

    <div class="service-card">
        <div class="icon-circle">📄</div>
        <h3>Capaian Kinerja K3</h3>
        <p>
            Pengujian lingkungan kerja, udara, faktor fisik,
            kualitas air, hingga pemeriksaan kesehatan.
        </p>
        <a href="capaian-kinerja.php">Lihat</a>
    </div>

</section>


<!-- ABOUT-->
<section class="about-modern" id="about">
    <div class="about-container">
        <!-- FOTO -->
        <div class="about-image">
            <img src="assets/galeri7.jpeg" alt="Tentang KEMNAKER">
        </div>
        <!-- KETERANGAN -->
        <div class="about-desc">
            <h2>Profile Balai K3</h2>
            <p>
                Balai Keselamatan dan Kesehatan Kerja (K3) Medan merupakan Unit Pelaksana Teknis (UPT) di lingkungan Kementerian Ketenagakerjaan Republik Indonesia yang berada di bawah dan bertanggung jawab kepada Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan dan Keselamatan dan Kesehatan Kerja (Ditjen Binwasnaker dan K3). </p>

            <P>Pembentukan, tugas, fungsi, dan susunan organisasi Balai K3 Medan berpedoman pada Peraturan Menteri Ketenagakerjaan Republik Indonesia Nomor 1 Tahun 2022 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis di Bidang Keselamatan dan Kesehatan Kerja.</P>

            <P>Wilayah kerja Balai K3 Medan meliputi:
            Provinsi Aceh, Sumatera Utara, Sumatera Barat, Riau, Kepulauan Riau, Jambi, Bangka Belitung, Bengkulu, dan Sumatera Selatan.
            </p>
        </div>
    </div>
</section>

<!--VISI DAN MISI-->
<section class="visi-misi-section" id="about">

    <h2 class="section-title">Visi dan Misi</h2>

    <div class="visi-misi-container">

        <!-- VISI -->
        <div class="visi-card">
            <h3>Visi</h3>
            <p>
                Terpenuhinya syarat Keselamatan dan Kesehatan Kerja (K3)
                di tempat kerja guna mewujudkan tenaga kerja yang produktif
                dan sejahtera.
            </p>
        </div>

        <!-- MISI -->
        <div class="misi-card">
            <h3>Misi</h3>
            <ul>
                <li>
                    Memberikan layanan pengujian K3 bagi masyarakat industri
                    melalui laboratorium terakreditasi dan SDM yang kompeten,
                    serta layanan bantuan teknis pemenuhan syarat K3.
                </li>
                <li>
                    Mempersiapkan tenaga kerja yang terampil di bidang K3
                    melalui pelatihan sesuai kebutuhan perusahaan dan potensi
                    bahaya di tempat kerja.
                </li>
                <li>
                    Memberikan kontribusi dalam penyebaran informasi dan
                    edukasi K3 kepada masyarakat.
                </li>
            </ul>
        </div>

    </div>

</section>


        <!-- WILAYAH KERJA-->
    <section class="wilayah-section" id="about">
        <h2 class="section-title">Wilayah Kerja Balai K3 Medan</h2>

    <div class="wilayah-container">

       
        <div class="wilayah-image">
            <img src="assets/denah.jpeg" alt="Wilayah Kerja Balai K3 Medan">
        </div>

       
        <div class="wilayah-content">
            <h2>Cakupan Wilayah</h2>

            <ul class="wilayah-list">
                <li>Aceh</li>
                <li>Sumatera Utara</li>
                <li>Kepulauan Riau</li>
                <li>Riau</li>
                <li>Sumatera Barat</li>
                <li>Sumatera Selatan</li>
                <li>Jambi</li>
                <li>Kepulauan Bangka Bengkulu</li>
                <li>Bengkulu</li>
            </ul>
        </div>

    </div>

</section>

    
<!-- CONTACT --->
<section class="contact-ref" id="contact">

    <div class="contact-overlay"></div>

    <div class="contact-content">

        <!-- KIRI -->
        <div class="contact-left">
            <img src="assets/logokemnaker.png" class="contact-logo" alt="Logo">

            <h3>
  <a href="https://bit.ly/Pengaduan_BK3Medan" target="_blank" rel="noopener noreferrer" style="color: white; text-decoration: none;">
    Klik Disini, untuk Pengaduan Pelayanan
  </a>
</h3>
            <h3>Balai Keselamatan dan Kesehatan Kerja</h3>
            <h2></h2>
        </div> 

        <!-- KANAN -->
        <div class="contact-right">

            <h2>Contact Us</h2>

            <ul class="contact-list">
                <li>
                    <span>📞</span>
                    <p>(061) 6850613</p>
                </li>
                <li>
                    <span>📍</span>
                    <p>Jl. KL. Yos Sudarso No.64, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242</p>
                </li>
                <li>
                    <span>✉️</span>
                    <p>balaik3medan@gmail.com</p>
                </li>
            </ul>

            <div class="contact-map">
                <iframe
                    src="https://maps.google.com/maps?q=balai%20k3%20medan&t=&z=15&output=embed"
                    loading="lazy">
                </iframe>
            </div>

        </div>

    </div>

</section>


<!-- FLOATING ACTION -->
<a href="https://wa.me/6285262229195" target="_blank" id="wa-float">
    <img src="assets/wa.png" alt="WhatsApp">
</a>

<button id="scrollTop">↑</button>


<script src="script.js"></script>
</body>
</html>