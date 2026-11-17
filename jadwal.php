<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Jadwal Pelayanan</title>

<style>
body{
    margin:0;
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f4f7fb;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    padding:30px 0;
    padding-top: 120px; 
}

.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background: #003366;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.container {
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

/* AKTIF */
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

/* FRAME */
.frame{
    background:#fff;
    width:520px;
    padding:35px 40px;
    border-radius:12px;
    box-shadow:0 8px 25px rgba(0,0,0,0.12);
    text-align:center;
    border-top:6px solid #15436d;
}

/* LOGO */
.logo-container{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:25px;
    margin-bottom:15px;
}

.logo-container img{
    height:55px;
    object-fit:contain;
}

/* HEADER */
.header-title{
    font-size:15px;
    font-weight:700;
    letter-spacing:1px;
    color:#15436d;
}

.sub-title{
    font-size:13px;
    font-weight:600;
    margin-bottom:20px;
    color:#15436d;
}

/* MAIN TITLE */
.main-title{
    font-size:22px;
    font-weight:700;
    margin:20px 0;
    letter-spacing:1px;
    color:#333;
}

/* JADWAL TABLE */
table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
    font-size:14px;
}

th{
    background:#15436d;
    color:white;
    padding:10px;
    font-weight:600;
}

td{
    padding:9px;
    border-bottom:1px solid #e0e0e0;
}

tr:last-child td{
    border-bottom:none;
}

/* FOOTER */
.footer{
    margin-top:25px;
    font-size:13px;
    color:#555;
}
</style>
</head>

<body>

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
            <a href="index.php" class="nav-link">Beranda</a>

            <!-- PROFILE -->
            <div class="dropdown">
                <a href="#" class="nav-link drop-btn">Profile ▾</a>
                <div class="dropdown-menu">
                    <a href="index.php#about">Profile Balai K3</a>
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
            <a href="index.php#contact" class="nav-link">Contact</a>

        </nav>

    </div>
</header>

<div class="frame">

    <div class="logo-container">
        <img src="assets/binwasnaker.png" alt="Logo 1">
        <img src="assets/KEMNAKER.png" alt="Logo Kemnaker">
        <img src="assets/penguji k3.png" alt="Logo 2">
    </div>

    <div class="header-title">KEMENTERIAN KETENAGAKERJAAN</div>
    <div class="sub-title">BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN</div>

    <div class="main-title">JADWAL PELAYANAN</div>

    <table>
        <tr>
            <th>Hari</th>
            <th>Jam Pelayanan</th>
        </tr>
        <tr><td>Senin</td><td>07.30 - 16.00 WIB</td></tr>
        <tr><td>Selasa</td><td>07.30 - 16.00 WIB</td></tr>
        <tr><td>Rabu</td><td>07.30 - 16.00 WIB</td></tr>
        <tr><td>Kamis</td><td>07.30 - 16.00 WIB</td></tr>
        <tr><td>Jumat</td><td>07.30 - 16.30 WIB</td></tr>
        <tr><td>Sabtu</td><td>Libur</td></tr>
        <tr><td>Minggu</td><td>Libur</td></tr>
    </table>

    <div class="footer">
        Medan, 2026<br>
        Kepala Balai K3 Medan
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