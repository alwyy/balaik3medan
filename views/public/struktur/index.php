<style>
.org-container {
    padding: 60px 20px 60px;
    text-align: center;
    max-width: 1240px;
    margin: 0 auto;
}

.org-container h1 {
    color: var(--color-primary, #003366);
    margin-bottom: 50px;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.org-level {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-bottom: 70px;
    position: relative;
    flex-wrap: wrap;
}

.org-card {
    background: #ffffff;
    border-radius: var(--radius-xl, 18px);
    width: 290px;
    padding: 26px 22px;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-md, 0 4px 14px rgba(15, 23, 42, 0.06));
    position: relative;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.25s ease;
}

.org-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover, 0 16px 36px rgba(0, 51, 102, 0.12));
    border-color: rgba(0, 51, 102, 0.25);
}

.avatar {
    width: 82px;
    height: 82px;
    background: linear-gradient(135deg, #003366, #15436d);
    border-radius: 50%;
    margin: -65px auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 32px;
    font-weight: bold;
    box-shadow: 0 4px 14px rgba(0, 51, 102, 0.25);
    border: 3px solid #ffffff;
    transition: transform 0.25s ease;
}

.org-card:hover .avatar {
    transform: scale(1.05);
}

.org-title {
    font-size: 15px;
    font-weight: 700;
    color: var(--color-primary, #003366);
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.02em;
}

.org-name {
    font-size: 14px;
    line-height: 1.6;
    color: var(--color-text-body, #334155);
}

.org-group {
    width: 350px;
}

.org-group ul {
    list-style: none;
    padding: 0;
    margin-top: 15px;
    text-align: left;
}

.org-group ul strong {
    display: block;
    margin-top: 10px;
    color: #15436d;
    font-size: 13px;
}

.org-group ul li {
    font-size: 13.5px;
    padding: 5px 0;
    border-bottom: 1px dashed #e2e8f0;
    color: #444;
}

.org-keterangan {
    max-width: 900px;
    margin: 20px auto 50px;
    font-size: 15px;
    line-height: 1.8;
    color: #444;
    text-align: justify;
    background: #fff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    border-left: 5px solid #15436d;
}

.data-wrapper {
    max-width: 1000px;
    margin: auto;
    padding: 20px 20px 60px;
}

.table-title {
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    margin: 45px 0 20px;
    color: #15436d;
}

.data-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    margin-bottom: 35px;
    font-size: 14px;
}

.data-table thead th {
    background: #15436d;
    color: #ffffff;
    padding: 13px;
    text-align: center;
    font-weight: 600;
}

.data-table td {
    padding: 11px 14px;
    border-bottom: 1px solid #e5e7eb;
    color: #334155;
}

.data-table tbody tr:last-child td {
    border-bottom: none;
}

.data-table tbody tr:hover {
    background: #f1f5f9;
}

.data-table td:first-child {
    text-align: center;
    width: 50px;
    font-weight: 500;
}

.data-table td:last-child {
    text-align: center;
    width: 90px;
    font-weight: 600;
    color: #0f172a;
}

.data-table tfoot td {
    background: #f8fafc;
    font-weight: 700;
    text-align: center;
    color: #15436d;
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
    .org-group {
        width: 100%;
        max-width: 340px;
    }
}
</style>

<div class="org-container">
    <h1>Struktur Organisasi Balai K3 Medan</h1>

    <!-- LEVEL 1 -->
    <div class="org-level">
        <div class="org-card">
            <div class="avatar">K</div>
            <div class="org-title">PLT. KEPALA BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN</div>
            <div class="org-name">
                dr. Santi Yuliandri, M.Kes<br>
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
                <li>SYAIFUL, S.Si, M.K.M</li>
                <strong>PENGUJI K3 AHLI MUDA</strong>
                <li>1. dr. WAYU PUTRI WULANDARI</li>
                <li>2. FADJAR BUDI SUHARTONO, S.K.M</li>
                <li>3. AGUS MUNANDAR, S.T</li>
                <li>4. JUFRI CARDO PASARIBU, S.T</li>
                <li>5. PRIHATMOKO SAPTINIS H, S.K.M, M.K.M</li>
                <li>6. IRZA MENKA DEVILIANY K, S.T</li>
                <li>7. SHOFIA RIJA NAPITUPULU, S.T</li>
                <li>8. dr. OLIN ADITAMA, M.K.K</li>
                <strong>PENGUJI K3 AHLI PERTAMA</strong>
                <li>1. SUDANA, S.K.M</li>
                <li>2. AULIA FADHLI SANI LUBIS, S.T</li>
                <li>3. ASTRI REQUITA BR TARIGAN, S.Si</li>
                <li>4. DESNI J. SIHOTANG, S.K.M</li>
                <li>5. AGUS ALFIANTO SITINJAK, SKM</li>
                <li>6. JEREMY OCMIIDIA EYKEL PUTRA</li>
                <li>7. SIAGIAN, S.T.</li>
                <strong>TEKNISI LITKAYASA PENYELIA</strong>
                <li>ABDUL RAHMAN</li>
                <strong>PRANATA KOMPUTER MAHIR</strong>
                <li>JERNITA TAMBUNAN, A.Md</li>
                <strong>ARSIPARIS AHLI PERTAMA</strong>
                <li>1. GUNAWAN WIBISONO, S.T</li>
                <li>2. MUHAMMAD ARIF, S.T</li>
                <strong>PRANATA LAB KESEHATAN TERAMPIL</strong>
                <li>ROIDA PANGARIBUAN, A.Md, A.K</li>
            </ul>
        </div>

        <!-- SUBBAG UMUM -->
        <div class="org-card org-group">
            <div class="avatar">U</div>
            <div class="org-title">KEPALA SUBBAGIAN UMUM</div>
            <div class="org-name">
                Muhammad Rizki Nasution, S.H<br>
                NIP. 19810412 201101 1 006
            </div>

            <ul>
                <strong>PENGOLAH DATA DAN INFORMASI</strong>
                <li>NUR KHALILAH, A.Md</li>
                <strong>PENGADMINISTRASI PERKANTORAN</strong>
                <li>SYAMSUDDIN</li>
                <strong>OPERATOR LAYANAN OPERASIONAL</strong>
                <li>DEDY HARYANDY</li>
                <strong>PENATA LAYANAN OPERASIONAL</strong>
                <li>INDRIA PRIMIATY D, S.Si, M.M</li>
                <li>FRIDA SIMORANGKIR, S.K.M</li>
                <li>MELVA SEPTIKA SIMANJUNTAK, S.K.M</li>
                <li>TRI YUDIKA, S.K.M</li>
                <li>ROYTO SIAGIAN, S.E</li>
                <li>IRPAN SUBHAN, S.K.M</li>
                <li>SRI JULI INDIYATI, S.K.M</li>
                <strong>PENELAAH TEKNIS KEBIJAKAN</strong> 
                <li>RINA AGUSTIN SULVAINA BR. PURBA, S.Pd</li>
                <li>HASMELA REVI, S.Kep, Ners, M.KES</li>
                <strong>TEKNISI SARANA DAN PRASARANA</strong>
                <li>DIMAS ANGGIT BRATAMA, S.T</li>
                <li>ZEFFRY, S.T</li>
                <strong>PENATA KELOLA SISTEM DAN INFORMASI TEKNISI</strong>
                <li>RIZAL OFGANI PURBA, S.T</li>
                <li>RIDWAN HERMAWAN SYAH, S.T</li>
                <li>MUHAMMAD ABI MUZAKI, S.KOM.</li>
                <strong>PENATA LAKSANA BARANG TERAMPIL</strong>
                <li>FRISKA JENIFER MANURUNG, A.Md.A.B</li>
                <strong>PRANATA KEUANGAN APBN TERAMPIL</strong>
                <li>EFRIANTI BR PURBA, A.Md</li>
                <strong>ANALIS PENGELOLAAN KEUANGAN APBN AHLI PERTAMA</strong>
                <li>MIFTAKHUL ZAHRA SHOFRINA, S.E</li>
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
            <tr><td>1</td><td>Pasca Sarjana &amp; Profesi</td><td>10 orang</td></tr>
            <tr><td>2</td><td>Sarjana (S1)</td><td>25 orang</td></tr>
            <tr><td>3</td><td>Diploma (D3)</td><td>5 orang</td></tr>
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
