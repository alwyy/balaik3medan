<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Maklumat Pelayanan – Balai K3 Medan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

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


.maklumat-section {
    padding: 80px 15px;
    background: #f4f7fb;
    display: flex;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.maklumat-frame {
    background: #ffffff;
    border: 12px solid #2f2f2f;
    max-width: 900px;
    width: 100%;
    padding: 35px 40px 55px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
}

.maklumat-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
}

.logo-left,
.logo-right {
    width: 80px;
}

.logo-center {
    width: 120px;
    margin-bottom: 10px;
}

.header-center {
    text-align: center;
}

.header-center h4 {
    margin: 8px 0 5px;
    font-size: 16px;
    color: #000;
}

.header-center p {
    font-size: 13px;
    line-height: 1.6;
}

.maklumat-title {
    text-align: center;
    font-size: 32px;
    letter-spacing: 2px;
    margin: 35px 0 30px;
    color: #000;
}

.maklumat-content {
    text-align: center;
    font-size: 15px;
    line-height: 1.9;
}

.maklumat-tegas {
    font-weight: bold;
    margin: 20px 0;
}

.maklumat-isi {
    font-weight: 600;
    margin: 20px auto 30px;
    max-width: 700px;
}

.maklumat-jabatan {
    margin-top: 25px;
    font-weight: bold;
}

.maklumat-ttd {
    margin-top: 20px;
}

.maklumat-ttd img {
    width: 130px;
    margin-bottom: 10px;
}

.barcode-link {
    display: inline-block;
    cursor: pointer;
}

.barcode-link img {
    transition: opacity 0.2s ease;
}

.barcode-link:hover img {
    opacity: 0.75;
}


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

    .maklumat-frame {
        padding: 25px 20px 40px;
    }

    .maklumat-header {
        flex-direction: column;
        gap: 15px;
    }

    .maklumat-title {
        font-size: 26px;
    }
}
</style>
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


<!-- MAKLUMAT CONTENT -->
<section class="maklumat-section">
    <div class="maklumat-frame">

        <div class="maklumat-header">
            <img src="assets/binwasnaker.png" class="logo-left" alt="Binwasnaker">

            <div class="header-center">
                <img src="assets/kemnaker.png" class="logo-center" alt="Kemnaker">
                <h4>KEMENTERIAN KETENAGAKERJAAN</h4>
                <h4>DIREKTORAT JENDERAL PEMBINAAN PENGAWASAN KETENAGAKERJAAN</h4>
                <h4>DAN K3 BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN</h4>
            </div>

            <img src="assets/penguji k3.png" class="logo-right" alt="K3">
        </div>

        <h1 class="maklumat-title">MAKLUMAT PELAYANAN</h1>

        <div class="maklumat-content">
            <p>
                DENGAN INI KAMI SELURUH PEGAWAI<br>
                BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN
                MENYATAKAN
            </p>

            <p class="maklumat-isi">
                "SIAP MENYELENGGARAKAN PELAYANAN SESUAI STANDAR PELAYANAN
                YANG TELAH DITETAPKAN DAN KAMI SIAP MENERIMA KRITIK,
                SARAN, DAN SANKSI GUNA PERBAIKAN PELAYANAN"
            </p>

            <p class="maklumat-jabatan">KEPALA BALAI K3 MEDAN</p>

            <div class="maklumat-ttd">
                <a href="https://tte.kemnaker.go.id/qr-code/4a2a73af8179b4e361b31c86929ced62" target="_blank" class="barcode-link">
                    <img src="assets/barcode.png" alt="Tanda Tangan">
                </a>
                <p>
                    <strong>dr. Muzakir, M.K.M.</strong><br>
                    NIP. 19740214 200501 1 002
                </p>
            </div>
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