<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Standar Pelayanan – UPT Ketenagakerjaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 0;
            color: #333;
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

        .regulation-section {
            padding: 70px 12%;
        }

        .regulation-section h1 {
            text-align: center;
            color: #000000;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #555;
            margin-bottom: 45px;
            font-size: 15px;
        }


        .pasal {
            margin-bottom: 26px;
        }

        .pasal h3 {
            margin: 0 0 8px;
            color: #000000;
            font-size: 17px;
        }

        .pasal p {
            margin: 0;
            line-height: 1.9;
            font-size: 14.5px;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .regulation-section {
                padding: 50px 7%;
            }

            .regulation-box {
                padding: 30px;
            }

            .pasal h3 {
                font-size: 16px;
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
<section class="regulation-section">

    <h1>Standar Pelayanan</h1>
    <p class="subtitle">
        Ringkasan Peraturan Menteri Ketenagakerjaan tentang
        Organisasi dan Tata Kerja Unit Pelaksana Teknis
    </p>

    <div class="regulation-box">

        <div class="pasal">
            <h3>Pasal 1</h3>
            <p>Mengatur pengertian dan definisi istilah penting, meliputi Unit Pelaksana Teknis (UPT), wilayah kerja, kementerian, dan menteri.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 2 – 3</h3>
            <p>Mengatur kedudukan UPT Bidang Pelatihan Vokasi dan Produktivitas yang berada di bawah Direktorat Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas serta klasifikasinya menjadi Balai Besar, Balai Kelas I, dan Balai Kelas II.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 4 – 5</h3>
            <p>Mengatur tugas dan fungsi Balai Besar Pelatihan Vokasi dan Produktivitas dalam pelaksanaan pelatihan vokasi, peningkatan produktivitas, sertifikasi kompetensi, uji coba metode, konsultansi, dan pengembangan jejaring.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 6 – 9</h3>
            <p>Mengatur susunan organisasi Balai Besar Pelatihan Vokasi dan Produktivitas yang terdiri atas Bagian Umum dan Kelompok Jabatan Fungsional beserta tugasnya.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 10</h3>
            <p>Menetapkan lokasi Balai Besar Pelatihan Vokasi dan Produktivitas di Medan, Serang, Bekasi, Bandung, Semarang, dan Makassar.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 11 – 12</h3>
            <p>Mengatur tugas dan fungsi Balai Pelatihan Vokasi dan Produktivitas Kelas I dalam pelatihan vokasi, sertifikasi kompetensi, konsultansi, dan peningkatan jejaring.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 13 – 14</h3>
            <p>Mengatur susunan organisasi Balai Pelatihan Vokasi dan Produktivitas Kelas I yang terdiri atas Subbagian Umum dan Kelompok Jabatan Fungsional.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 15</h3>
            <p>Menetapkan lokasi Balai Pelatihan Vokasi dan Produktivitas Kelas I.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 16 – 17</h3>
            <p>Mengatur tugas dan fungsi Balai Pelatihan Vokasi dan Produktivitas Kelas II dalam pelaksanaan pelatihan vokasi dan peningkatan produktivitas.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 18 – 19</h3>
            <p>Mengatur susunan organisasi Balai Pelatihan Vokasi dan Produktivitas Kelas II.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 20</h3>
            <p>Menetapkan lokasi Balai Pelatihan Vokasi dan Produktivitas Kelas II.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 21</h3>
            <p>Mengatur pembentukan Satuan Pelayanan sebagai unit nonstruktural untuk memperluas jangkauan pelayanan pelatihan vokasi dan produktivitas.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 22 – 23</h3>
            <p>Mengatur kedudukan, tugas, fungsi, susunan organisasi, dan lokasi UPT Bidang Perluasan Kesempatan Kerja, baik Balai Besar maupun Balai.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 24 – 25</h3>
            <p>Mengatur tugas dan fungsi Balai Besar Perluasan Kesempatan Kerja dalam penciptaan tenaga kerja mandiri lanjutan dan perluasan kesempatan kerja berbasis kawasan.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 26 – 29</h3>
            <p>Mengatur susunan organisasi dan tugas Bagian Umum pada Balai Besar Perluasan Kesempatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 30</h3>
            <p>Menetapkan lokasi Balai Besar Perluasan Kesempatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 31 – 32</h3>
            <p>Mengatur tugas dan fungsi Balai Perluasan Kesempatan Kerja dalam penciptaan tenaga kerja mandiri pemula.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 33 – 34</h3>
            <p>Mengatur susunan organisasi Balai Perluasan Kesempatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 35</h3>
            <p>Menetapkan lokasi Balai Perluasan Kesempatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 36 – 37</h3>
            <p>Mengatur kedudukan dan klasifikasi UPT Bidang Keselamatan dan Kesehatan Kerja (K3).</p>
        </div>

        <div class="pasal">
            <h3>Pasal 38 – 39</h3>
            <p>Mengatur tugas dan fungsi Balai Besar Keselamatan dan Kesehatan Kerja dalam pengujian, kalibrasi, pemeriksaan kesehatan kerja, dan konsultansi K3.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 40 – 43</h3>
            <p>Mengatur susunan organisasi dan tugas Bagian Umum Balai Besar Keselamatan dan Kesehatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 44</h3>
            <p>Menetapkan lokasi Balai Besar Keselamatan dan Kesehatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 45 – 46</h3>
            <p>Mengatur tugas dan fungsi Balai Keselamatan dan Kesehatan Kerja tingkat regional.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 47 – 48</h3>
            <p>Mengatur susunan organisasi Balai Keselamatan dan Kesehatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 49</h3>
            <p>Menetapkan lokasi Balai Keselamatan dan Kesehatan Kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 50 – 52</h3>
            <p>Mengatur Kelompok Jabatan Fungsional, termasuk tugas, pengelompokan, dan penetapan jumlah berdasarkan analisis jabatan dan beban kerja.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 53 – 59</h3>
            <p>Mengatur tata kerja UPT yang mencakup akuntabilitas kinerja, koordinasi, pengawasan, dan sistem pengendalian internal.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 60 – 61</h3>
            <p>Mengatur ketentuan jabatan, pengangkatan, dan pemberhentian pejabat struktural dan fungsional di lingkungan UPT.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 62 – 63</h3>
            <p>Mengatur ketentuan lain-lain mengenai lampiran nomenklatur, lokasi, wilayah kerja, dan perubahan organisasi UPT.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 64 – 65</h3>
            <p>Mengatur ketentuan peralihan terkait keberlanjutan pelaksanaan tugas UPT berdasarkan peraturan sebelumnya.</p>
        </div>

        <div class="pasal">
            <h3>Pasal 66 – 68</h3>
            <p>Mengatur ketentuan penutup, pencabutan peraturan lama, dan mulai berlakunya Peraturan Menteri ini.</p>
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