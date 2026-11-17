<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Struktur Organisasi – Balai K3 Medan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f7fb;
    padding-top: 70px; 
}


.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background: #003366;
    transition: background 0.4s ease;
}

.navbar.scrolled {
    background: #003366;
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
}


@media (max-width: 768px) {
    .hamburger {
        display: flex;
    }
    
    .nav-menu {
        position: fixed;
        left: -100%;
        top: 70px;
        flex-direction: column;
        background: #003366;
        width: 100%;
        padding: 20px 0;
        transition: 0.3s;
    }
    
    .nav-menu.active {
        left: 0;
    }
    
    .dropdown-menu {
        position: static;
        box-shadow: none;
        background: rgba(255,255,255,0.1);
        border-radius: 0;
    }
}


.org-container {
    padding: 60px 20px;
    text-align: center;
}


.org-container h1 {
    color: #000000;
    margin-bottom: 60px;
}


.org-level {
    display: flex;
    justify-content: center;
    gap: 50px;
    margin-bottom: 80px;
    position: relative;
}


.org-card {
    background: #fff;
    border-radius: 18px;
    width: 280px;
    padding: 25px 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    position: relative;
}

.org-card::after {
    content: "";
    position: absolute;
    bottom: -40px;
    left: 50%;
    width: 2px;
    height: 40px;
    background: #cbd5e1;
    transform: translateX(-50%);
}


.avatar {
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg, #1f6fb2, #4aa3ff);
    border-radius: 50%;
    margin: -70px auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
}


.org-title {
    font-size: 16px;
    font-weight: 700;
    color: #1f4e79;
    margin-bottom: 10px;
}

.org-name {
    font-size: 14px;
    line-height: 1.6;
    color: #555;
}


.org-group {
    width: 340px;
}

.org-group ul {
    list-style: none;
    padding: 0;
    margin-top: 15px;
    text-align: left;
}

.org-group ul li {
    font-size: 14px;
    padding: 6px 0;
    border-bottom: 1px dashed #e2e8f0;
}


.org-keterangan {
    max-width: 900px;
    margin: 20px auto 70px;
    font-size: 15px;
    line-height: 1.8;
    color: #333;
    text-align: justify;
}


.data-wrapper {
    max-width: 1100px;
    margin: auto;
    padding: 40px 20px;
}


.table-title {
    text-align: center;
    font-size: 22px;
    font-weight: 600;
    margin: 50px 0 20px;
    color: #1e293b;
}


.data-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    margin-bottom: 40px;
    font-size: 14px;
}

.data-table thead th {
    background: #1f6fb2;
    color: #ffffff;
    padding: 14px;
    text-align: center;
    font-weight: 600;
}

/*BODY*/
.data-table td {
    padding: 12px 14px;
    border-bottom: 1px solid #e5e7eb;
    color: #334155;
}

.data-table tbody tr:last-child td {
    border-bottom: none;
}


.data-table tbody tr:hover {
    background: #f1f5f9;
    transition: 0.2s ease;
}


.data-table td:first-child {
    text-align: center;
    width: 50px;
    font-weight: 500;
}

.data-table td:last-child {
    text-align: center;
    width: 80px;
    font-weight: 600;
    color: #0f172a;
}


.data-table tfoot td {
    background: #f8fafc;
    font-weight: 700;
    text-align: center;
    color: #0f172a;
}


@media (max-width: 768px) {
    .data-table {
        font-size: 13px;
    }

    .table-title {
        font-size: 18px;
    }
    
    .org-level {
        flex-direction: column;
        align-items: center;
    }
}
</style>
</head>

<body>


<header class="navbar" id="navbar">
    <div class="container">

       
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

<div class="org-container">
    <h1>Struktur Organisasi Balai K3 Medan</h1>

    <!-- LEVEL 1 -->
    <div class="org-level">
        <div class="org-card">
            <div class="avatar">K</div>
            <div class="org-title">PLT. KEPALA BALAI KESELAMATAN DAN KESEHATAN KERJA 
            MEDAN
            </div>
            <div class="org-name">
                dr. Santi Yuliandri, MKes<br>
                NIP. 19830702 200901 2 003
            </div>
        </div>
    </div>

    <!-- LEVEL 2 -->
    <div class="org-level">

        <!-- FUNGSIONAL -->
        <div class="org-card org-group">
            <div class="avatar">F</div>
            <div class="org-title">KELOMPOK JABATAN FUNGSIONAL</div>
            <ul>
                <strong>PENGUJI K3 AHLI MADYA</strong>
                <LI>SYAIFUL,S.Si,M.K.M</li>
                <strong>PENGUJI K3 AHLI MUDA</strong>
                <li>1.  dr. WAYU PUTRI WULANDARI</li>
                <li>2.  FADJAR BUDI SUHARTONO,S.K.M</li>
                <li>3.  AGUS MUNANDAR,S.T </li>
                <li>4.  JUFRI CARDO PASARIBU,S.T </li>
                <li>5. PRIHATMOKO SAPTINIS H,S.K.M,M.K.M</li>
                <li>6.  IRZA MENKA DEVILIANY K, S.T </li>
                <li>7.  SHOFIA RIJA NAPITUPULU,S.T </li>
                <li>8.  dr. OLIN ADITAMA,M.K.K</li>
                <strong>PENGUJI K3 AHLI PERTAMA</strong>
                <li>1.  SUDANA,S.K.M</li>
                <li>2.  AULIA FADHLI SANI LUBIS,S.T</li>
                <li>3.  ASTRI REQUITA BR TARIGAN,S.Si</li>
                <li>4.  DESNI J. SIHOTANG,S.K.M</li>
                <li>5.  AGUS ALFIANTO SITINJAK,SKM</li>
                <li>6.  JEREMY OCMIIDIA EYKEL PUTRA </li>
                <li>7.  SIAGIAN, S.T. </li>
                <strong>TEKNISI LITKAYASA  PENYELIA </strong>
                <li>ABDUL RAHMAN  </li>
                <strong>PRANATA KOMPUTER MAHIR</strong>
                <li>JERNITA TAMBUNAN,A.Md  </li>
                <strong>ARSIPARIS AHLI PERTAMA</strong>
                <li>1.  GUNAWAN WIBISONO,S.T </li>
                <li>2.  MUHAMMAD ARIF,S.T </li>
                <strong>PRANATA LAB KESEHATAN TERAMPIL</strong>
                <li>ROIDA PANGARIBUAN,A.Md,A.K </li>
            </ul>
        </div>

        <!-- SUBBAG -->
        <div class="org-card org-group">
            <div class="avatar">U</div>
            <div class="org-title">KEPALA SUBBAGIAN UMUM</div>
            <div class="org-name">
                Muhammad Rizki Nasution, S.H<br>
                NIP. 19810412 201101 1 006
            </div>

            <ul>
                <strong>PENGOLAH DATA DAN INFORMASI</strong>
                <li>NUR KHALILAH,A.Md </li>
                <strong>PENGADMINITRASI PERKANTORAN</strong>
                <li>SYAMSUDDIN</li>
                <strong>OPERATOR LAYANAN OPERASIONAL</strong>
                <li>DEDY HARYANDY</li>
                <strong>PENATA LAYANAN OPERASIONAL</strong>
                <li>INDRIA PRIMIATY D,S.Si,M.M</li>
                <li>FRIDA SIMORANGKIR,S.K.M </li>
                <li>MELVA SEPTIKA SIMANJUNTAK, S.K.M</li>
                <li>TRI YUDIKA,S.K.M</li>
                <li>ROYTO SIAGIAN,S.E</li>
                <li>IRPAN SUBHAN,S.K.M</li>
                <li>SRI JULI INDIYATI, S.K.M</li>
                <strong>PENELAAH TEKNIS KEBIJAKAN</strong> 
                <li>RINA AGUSTIN SULVAINA. BR.PURBA,S.Pd</li>
                <li>HASMELA REVI,S.Kep,Ners,M.KES</li>
                <strong>TEKNISI SARANA DAN PRASARANA</strong>
                <li>DIMAS ANGGIT BRATAMA, S.T</li>
                <li>ZEFFRY S.T</li>
                <strong>PENATA KELOLA SISTEM DAN INFORMASI TEKNISI</strong>
                <li>RIZAL OFGANI PURBA S.T</li>
                <li>RIDWAN HERMAWAN SYAH, S.T</li>
                <li>MUHAMMAD ABI MUZAKI, S.KOM.</li>
                <strong>PENATA LAKSANA BARANG TERAMPIL</strong>
                <li>FRISKA JENIFER MANURUNG A.Md.A.B</li>
                <strong>PRANATA KEUANGAN APBN TERAMPIL</strong>
                <li>EFRIANTI BR PURBA A.Md</li>
                <strong>ANALIS PENGELOLAAN KEUANGAN APBN AHLI PERTAMA</strong>
                <li>MIFTAKHUL ZAHRA SHOFRINA S.E</li>
            </ul>
        </div>

    </div>
</div>


<div class="org-keterangan">
    <strong>SUSUNAN ORGANISASI BALAI K3 MEDAN</strong><br><br>
    Sesuai Pasal 47 Permenaker Nomor 1 Tahun 2022, Balai K3 Medan terdiri atas:
    Subbagian Umum dan Kelompok Jabatan Fungsional.
    Subbagian Umum mempunyai tugas melaksanakan penyusunan rencana, program dan anggaran, urusan keuangan, SDM aparatur, organisasi dan tata laksana, rumah tangga, persuratan dan kearsipan, perlengkapan, pengelolaan barang milik negara, serta penyusunan evaluasi dan pelaporan.
</div>

<div class="data-wrapper">


    <h2 class="table-title">Jumlah Personil Menurut Jabatan</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>Eselon III</strong><br>Kepala Balai K3 Medan</td>
                <td>1 orang</td>
            </tr>
            <tr>
                <td>2</td>
                <td><strong>Eselon IV</strong><br>Kepala Subbagian Umum</td>
                <td>1 orang</td>
            </tr>
            <tr>
                <td>3</td>
                <td><strong>Fungsional</strong></td>
                <td></td>
            </tr>
            <tr><td></td><td>Penguji K3 Ahli Madya</td><td>1 orang</td></tr>
            <tr><td></td><td>Penguji K3 Ahli Muda</td><td>8 orang</td></tr>
            <tr><td></td><td>Penguji K3 Ahli Pertama</td><td>7 orang</td></tr>
            <tr><td></td><td>Pranata Komputer Mahir</td><td>1 orang</td></tr>
            <tr><td></td><td>Pranata Laboratorium Kesehatan Terampil</td><td>1 orang</td></tr>
            <tr><td></td><td>Arsiparis Ahli Pertama</td><td>2 orang</td></tr>
            <tr><td></td><td>Teknisi Litkayasa Penyelia</td><td>1 orang</td></tr>
            <tr><td></td><td>Analis Pengelolaan Keuangan APBN Ahli Pertama</td><td>1 orang</td></tr>
            <tr><td></td><td>Penata Laksana Barang Terampil</td><td>1 orang</td></tr>
            <tr><td></td><td>Pranata Keuangan APBN Terampil</td><td>1 orang</td></tr>

            <tr>
                <td>4</td>
                <td><strong>Jabatan Pelaksana</strong></td>
                <td></td>
            </tr>
            <tr><td></td><td>Pengolah Data dan Informasi</td><td>1 orang</td></tr>
            <tr><td></td><td>Pengadministrasi Perkantoran</td><td>1 orang</td></tr>
            <tr><td></td><td>Penata Layanan Operasional</td><td>7 orang</td></tr>
            <tr><td></td><td>Penelaah Teknis Kebijakan</td><td>2 orang</td></tr>
            <tr><td></td><td>Teknisi Sarana dan Prasarana</td><td>2 orang</td></tr>
            <tr><td></td><td>Penata Kelola Sistem dan Teknologi Informasi</td><td>3 orang</td></tr>
            <tr><td></td><td>Operator Layanan Operasional</td><td>1 orang</td></tr>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2">Jumlah Pegawai dan PPPK</td>
                <td>43 orang</td>
            </tr>
        </tfoot>
    </table>

    <!-- GOLONGAN -->
    <h2 class="table-title">Jumlah Personil Menurut Golongan</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pangkat / Golongan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>Golongan IV – Pembina IV/a</td><td>4 orang</td></tr>
            <tr><td>2</td><td>Golongan III</td><td></td></tr>
            <tr><td></td><td>Penata Tk I III/d</td><td>4 orang</td></tr>
            <tr><td></td><td>Penata III/c</td><td>6 orang</td></tr>
            <tr><td></td><td>Penata Muda Tk I III/b</td><td>5 orang</td></tr>
            <tr><td></td><td>Penata Muda III/a</td><td>12 orang</td></tr>
            <tr><td>3</td><td>Golongan II – Pengatur II/c</td><td>4 orang</td></tr>
            <tr><td>4</td><td>PPPK</td><td></td></tr>
            <tr><td></td><td>Golongan IX</td><td>5 orang</td></tr>
            <tr><td></td><td>Golongan VII</td><td>1 orang</td></tr>
            <tr><td></td><td>Lainnya</td><td>2 orang</td></tr>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2">Jumlah Pegawai dan PPPK</td>
                <td>43 orang</td>
            </tr>
        </tfoot>
    </table>

  
    <h2 class="table-title">Jumlah Personil Menurut Pendidikan</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pendidikan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>Pasca Sarjana & Profesi</td><td>10 orang</td></tr>
            <tr><td>2</td><td>Sarjana</td><td>25 orang</td></tr>
            <tr><td>3</td><td>D3</td><td>5 orang</td></tr>
            <tr><td>4</td><td>SLTA</td><td>3 orang</td></tr>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2">Jumlah</td>
                <td>43 orang</td>
            </tr>
        </tfoot>
    </table>

    
    <h2 class="table-title">Jumlah Personil Menurut Jenis Kelamin</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kelamin</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>Laki-laki</td><td>23 orang</td></tr>
            <tr><td>2</td><td>Perempuan</td><td>20 orang</td></tr>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2">Jumlah</td>
                <td>43 orang</td>
            </tr>
        </tfoot>
    </table>

</div>

<script>
// Hamburger menu toggle
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
});

// Dropdown toggle
const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const dropBtn = dropdown.querySelector('.drop-btn');
    
    dropBtn.addEventListener('click', (e) => {
        e.preventDefault();
        
        // Close other dropdowns
        dropdowns.forEach(d => {
            if (d !== dropdown) {
                d.classList.remove('active');
            }
        });
        
        // Toggle current dropdown
        dropdown.classList.toggle('active');
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.dropdown')) {
        dropdowns.forEach(d => {
            d.classList.remove('active');
        });
    }
});

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>

</body>
</html>
