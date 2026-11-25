@extends('layouts.app')

@section('content')
<style>
/* ==========================================================================
   STRUKTUR ORGANISASI BALAI K3 MEDAN (COMPACT HIERARCHICAL CHART)
   ========================================================================== */
.org-container {
    padding: 40px 16px 60px;
    max-width: 1200px;
    margin: 0 auto;
}

.org-header-area {
    text-align: center;
    margin-bottom: 35px;
}

.org-header-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(9, 55, 125, 0.08);
    color: var(--color-primary, #09377D);
    border: 1px solid rgba(9, 55, 125, 0.2);
    padding: 5px 14px;
    border-radius: 9999px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.org-header-area h1 {
    color: var(--color-primary, #09377D);
    margin: 0 0 10px;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.01em;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.org-header-subtitle {
    font-size: 14.5px;
    color: #64748b;
    max-width: 650px;
    margin: 0 auto;
    line-height: 1.5;
}

/* KONTROL TAB FILTER / TAMPILAN */
.org-view-controls {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 30px;
}

.btn-org-tab {
    padding: 8px 18px;
    border-radius: 9999px;
    font-size: 13px;
    font-weight: 600;
    border: 1px solid #cbd5e1;
    background: #ffffff;
    color: #475569;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.btn-org-tab.active,
.btn-org-tab:hover {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    border-color: var(--color-primary, #09377D);
    box-shadow: 0 4px 12px rgba(9, 55, 125, 0.18);
}

/* ==========================================================================
   BAGAN POHON STRUKTUR HIERARKIS (COMPACT TREE CHART)
   ========================================================================== */
.org-chart-wrap {
    position: relative;
    padding: 10px 0 30px;
}

/* LEVEL 1: PIMPINAN (ESELON III) */
.org-node-level-1 {
    display: flex;
    justify-content: center;
    position: relative;
    margin-bottom: 40px;
}

.org-node-level-1::after {
    content: '';
    position: absolute;
    bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 40px;
    background: #94a3b8;
}

/* KARTU PEJABAT KOMPAK */
.compact-card {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
    padding: 16px 20px;
    position: relative;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    text-align: center;
}

.compact-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(9, 55, 125, 0.12);
    border-color: #5FBAE2;
}

.compact-card.card-pimpinan {
    width: 420px;
    max-width: 95%;
    border-top: 4px solid #09377D;
    background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
}

.grade-badge {
    display: inline-block;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    padding: 4px 11px;
    border-radius: 6px;
    margin-bottom: 9px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.badge-eselon-3 {
    background: rgba(9, 55, 125, 0.08);
    color: #09377D;
    border: 1px solid rgba(9, 55, 125, 0.2);
}

.badge-eselon-4 {
    background: rgba(108, 194, 156, 0.15);
    color: #1e6648;
    border: 1px solid rgba(108, 194, 156, 0.4);
}

.badge-fungsional {
    background: rgba(95, 186, 226, 0.15);
    color: #09377D;
    border: 1px solid rgba(95, 186, 226, 0.4);
}

.card-title-compact {
    font-size: 15px;
    font-weight: 800;
    color: #09377D;
    margin-bottom: 7px;
    line-height: 1.4;
    text-transform: uppercase;
    letter-spacing: 0.02em;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.card-name-compact {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 3px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.card-nip-compact {
    font-size: 13px;
    color: #64748b;
    font-family: var(--font-mono, monospace);
    font-weight: 500;
}

/* ==========================================================================
   LEVEL 2: DUA SAYAP UTAMA (FUNGSIONAL & SUBBAG UMUM)
   ========================================================================== */
.org-wings-level-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
    position: relative;
    padding-top: 25px;
}

/* GARIS CABANG HORIZONTAL ANTARA SAYAP */
.org-wings-level-2::before {
    content: '';
    position: absolute;
    top: 0;
    left: 25%;
    right: 25%;
    height: 2px;
    background: #94a3b8;
}

.org-wing-column {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.org-wing-column::before {
    content: '';
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 25px;
    background: #94a3b8;
}

.compact-card.card-wing-leader {
    width: 100%;
    max-width: 500px;
    border-top: 4px solid #5FBAE2;
    margin-bottom: 20px;
    position: relative;
}

.compact-card.card-wing-leader.leader-umum {
    border-top-color: #6CC29C;
}

/* ==========================================================================
   LEVEL 3: SUB-UNIT / BIDANG TUGAS & CHIPS PERSONIL
   ========================================================================== */
.sub-units-grid {
    display: flex;
    flex-direction: column;
    gap: 14px;
    width: 100%;
    max-width: 500px;
}

.sub-unit-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    padding: 15px 16px;
    text-align: left;
    transition: all 0.2s ease;
}

.sub-unit-card:hover {
    border-color: #cbd5e1;
    background: #fcfdfe;
}

.sub-unit-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 11px;
    border-bottom: 1px dashed #e2e8f0;
    padding-bottom: 8px;
}

.sub-unit-title {
    font-size: 14.5px;
    font-weight: 700;
    color: #1e293b;
    text-transform: uppercase;
    letter-spacing: 0.02em;
    display: flex;
    align-items: center;
    gap: 7px;
}

.sub-unit-count {
    font-size: 12px;
    font-weight: 700;
    background: #f1f5f9;
    color: #334155;
    padding: 3px 9px;
    border-radius: 9999px;
    border: 1px solid #e2e8f0;
    white-space: nowrap;
}

/* ==========================================================================
   DAFTAR PERSONIL: GROUPING BERDASARKAN JABATAN / PERAN
   ========================================================================== */
.personil-list-wrap {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width: 100%;
}

/* Item tunggal / berurutan (Penguji Ahli Muda & Pertama) */
.personil-name-item {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 7px 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    width: 100%;
    box-sizing: border-box;
    font-size: 13.5px;
    font-weight: 600;
    color: #0f172a;
    line-height: 1.35;
    transition: all 0.15s ease;
}

.personil-name-item:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
}

/* Blok kelompok peran/jabatan dengan daftar nama di bawahnya */
.personil-group-block {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 9px 12px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    width: 100%;
    box-sizing: border-box;
    transition: all 0.15s ease;
}

.personil-group-block:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
}

.personil-group-role {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    color: var(--color-primary, #09377D);
    line-height: 1.25;
    padding-bottom: 5px;
    border-bottom: 1px dashed #e2e8f0;
}

.personil-group-names {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.personil-group-name {
    font-size: 13.5px;
    font-weight: 600;
    color: #0f172a;
    line-height: 1.35;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 2px 0;
}

.personil-dot {
    width: 4px;
    height: 4px;
    background: #94a3b8;
    border-radius: 50%;
    flex-shrink: 0;
}

.personil-no {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 19px;
    height: 19px;
    background: #e2e8f0;
    color: #475569;
    font-size: 10.5px;
    font-weight: 700;
    border-radius: 5px;
    flex-shrink: 0;
}

/* ==========================================================================
   KETERANGAN & STATISTIK (DATA TABLES)
   ========================================================================== */
.org-keterangan {
    max-width: 900px;
    margin: 35px auto 40px;
    font-size: 14px;
    line-height: 1.75;
    color: #334155;
    text-align: justify;
    background: #ffffff;
    padding: 20px 26px;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    border-left: 4px solid var(--color-primary, #09377D);
    border: 1px solid #e2e8f0;
    border-left-width: 4px;
}

.data-wrapper {
    max-width: 960px;
    margin: auto;
    padding: 0 16px 50px;
}

.tables-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 25px;
}

.table-title {
    text-align: left;
    font-size: 17px;
    font-weight: 700;
    margin: 0 0 12px;
    color: #09377D;
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.data-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    margin-bottom: 20px;
    font-size: 13px;
}

.data-table thead th {
    background: #09377D;
    color: #ffffff;
    padding: 10px 12px;
    text-align: center;
    font-weight: 600;
    font-size: 12.5px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.data-table td {
    padding: 8px 12px;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
}

.data-table tbody tr:hover {
    background: #f8fafc;
}

.data-table td:first-child {
    text-align: center;
    width: 42px;
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
    color: #09377D;
    border-top: 1px solid #e2e8f0;
}

/* ==========================================================================
   RESPONSIVITAS MOBILE
   ========================================================================== */
@media (max-width: 900px) {
    .org-wings-level-2 {
        grid-template-columns: 1fr;
        gap: 35px;
    }
    .org-wings-level-2::before {
        display: none;
    }
    .org-wing-column::before {
        top: -20px;
        height: 20px;
    }
    .tables-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .org-container {
        padding: 30px 14px 50px;
    }
    .org-header-area h1 {
        font-size: 24px;
    }
    .compact-card.card-pimpinan {
        width: 100%;
        padding: 18px 18px;
    }
    .grade-badge {
        font-size: 11px;
        padding: 3.5px 10px;
    }
    .card-title-compact {
        font-size: 14.5px;
        line-height: 1.4;
    }
    .card-name-compact {
        font-size: 15.5px;
    }
    .card-nip-compact {
        font-size: 12.5px;
    }
    .sub-units-grid {
        max-width: 100%;
    }
    .sub-unit-title {
        font-size: 14px;
    }
    .sub-unit-count {
        font-size: 11.5px;
    }
    .personil-list-wrap {
        gap: 6px;
    }
    .personil-name-item {
        padding: 6.5px 10px;
        font-size: 13px;
    }
    .personil-group-block {
        padding: 8px 10px;
    }
    .personil-group-role {
        font-size: 10.5px;
    }
    .personil-group-name {
        font-size: 13px;
    }
    .personil-no {
        width: 18px;
        height: 18px;
        font-size: 10px;
    }
}
</style>

<div class="org-container">

    <!-- HEADER -->
    <div class="org-header-area">
        <h1>Struktur Organisasi Balai K3 Medan</h1>
        <p class="org-header-subtitle">
            Bagan tata kelola dan susunan sumber daya aparatur Balai Keselamatan dan Kesehatan Kerja Medan berdasarkan Permenaker RI No. 1 Tahun 2022.
        </p>
    </div>

    <!-- VIEW TAB CONTROLS -->
    <div class="org-view-controls">
        <button type="button" class="btn-org-tab active" id="tabChartBtn" onclick="switchOrgView('chart')">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="6" x="8" y="2" rx="1"/><rect width="8" height="6" x="2" y="16" rx="1"/><rect width="8" height="6" x="14" y="16" rx="1"/><path d="M12 8v4"/><path d="M6 12h12v4"/></svg>
            <span>Sturuktur Pegawai</span>
        </button>
        <button type="button" class="btn-org-tab" id="tabDataBtn" onclick="switchOrgView('data')">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><rect width="4" height="7" x="7" y="10" rx="1"/><rect width="4" height="12" x="15" y="5" rx="1"/></svg>
            <span>Rekapitulasi Pegawai</span>
        </button>
    </div>

    <!-- ==========================================================================
         BAGAN HIERARKI POHON KOMPAK
         ========================================================================== -->
    <div class="org-chart-wrap" id="orgChartView">

        <!-- LEVEL 1: PIMPINAN (ESELON III) -->
        <div class="org-node-level-1">
            <div class="compact-card card-pimpinan">
                <span class="grade-badge badge-eselon-3">Pimpinan Balai &bull; Eselon III</span>
                <div class="card-title-compact">Plt. Kepala Balai Keselamatan dan Kesehatan Kerja Medan</div>
                <div class="card-name-compact">dr. Santi Yuliandri, M.Kes</div>
                <div class="card-nip-compact">NIP. 19830702 200901 2 003</div>
            </div>
        </div>

        <!-- LEVEL 2: DUA SAYAP UTAMA BERDAMPINGAN -->
        <div class="org-wings-level-2">

            <!-- SAYAP KIRI: KELOMPOK JABATAN FUNGSIONAL -->
            <div class="org-wing-column">
                <div class="compact-card card-wing-leader leader-fungsional">
                    <span class="grade-badge badge-fungsional">Koordinator Keahlian</span>
                    <div class="card-title-compact">Kelompok Jabatan Fungsional</div>
                    <div class="card-name-compact">Syaiful, S.Si, M.K.M</div>
                    <div class="card-nip-compact">Penguji K3 Ahli Madya (Sub-Koordinator)</div>
                </div>

                <!-- SUB-UNIT BIDANG TUGAS DI BAWAH FUNGSIONAL -->
                <div class="sub-units-grid">
                    
                    <!-- 1. PENGUJI K3 AHLI MUDA -->
                    <div class="sub-unit-card">
                        <div class="sub-unit-header">
                            <span class="sub-unit-title">Penguji K3 Ahli Muda</span>
                            <span class="sub-unit-count">8 Personil</span>
                        </div>
                        <div class="personil-list-wrap">
                            <div class="personil-name-item"><span class="personil-no">1</span> dr. Wayu Putri Wulandari</div>
                            <div class="personil-name-item"><span class="personil-no">2</span> Fadjar Budi Suhartono, S.K.M</div>
                            <div class="personil-name-item"><span class="personil-no">3</span> Agus Munandar, S.T</div>
                            <div class="personil-name-item"><span class="personil-no">4</span> Jufri Cardo Pasaribu, S.T</div>
                            <div class="personil-name-item"><span class="personil-no">5</span> Prihatmoko Saptinis H, M.K.M</div>
                            <div class="personil-name-item"><span class="personil-no">6</span> Irza Menka Deviliany K, S.T</div>
                            <div class="personil-name-item"><span class="personil-no">7</span> Shofia Rija Napitupulu, S.T</div>
                            <div class="personil-name-item"><span class="personil-no">8</span> dr. Olin Aditama, M.K.K</div>
                        </div>
                    </div>

                    <!-- 2. PENGUJI K3 AHLI PERTAMA -->
                    <div class="sub-unit-card">
                        <div class="sub-unit-header">
                            <span class="sub-unit-title">Penguji K3 Ahli Pertama</span>
                            <span class="sub-unit-count">7 Personil</span>
                        </div>
                        <div class="personil-list-wrap">
                            <div class="personil-name-item"><span class="personil-no">1</span> Sudana, S.K.M</div>
                            <div class="personil-name-item"><span class="personil-no">2</span> Aulia Fadhli Sani Lubis, S.T</div>
                            <div class="personil-name-item"><span class="personil-no">3</span> Astri Requita Br Tarigan, S.Si</div>
                            <div class="personil-name-item"><span class="personil-no">4</span> Desni J. Sihotang, S.K.M</div>
                            <div class="personil-name-item"><span class="personil-no">5</span> Agus Alfianto Sitinjak, SKM</div>
                            <div class="personil-name-item"><span class="personil-no">6</span> Jeremy Ocmiidia Eykel Putra</div>
                            <div class="personil-name-item"><span class="personil-no">7</span> Siagian, S.T.</div>
                        </div>
                    </div>

                    <!-- 3. FUNGSIONAL TEKNIS & KETERAMPILAN -->
                    <div class="sub-unit-card">
                        <div class="sub-unit-header">
                            <span class="sub-unit-title">Fungsional Terampil &amp; Teknis</span>
                            <span class="sub-unit-count">5 Personil</span>
                        </div>
                        <div class="personil-list-wrap">
                            <div class="personil-group-block">
                                <div class="personil-group-role">Teknisi Litkayasa Penyelia</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Abdul Rahman</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Pranata Komputer Mahir</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Jernita Tambunan, A.Md</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Arsiparis Ahli Pertama</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Gunawan Wibisono, S.T</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Muhammad Arif, S.T</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Pranata Laboratorium Kesehatan Terampil</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Roida Pangaribuan, A.Md, A.K</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- SAYAP KANAN: SUBBAGIAN UMUM -->
            <div class="org-wing-column">
                <div class="compact-card card-wing-leader leader-umum">
                    <span class="grade-badge badge-eselon-4">Manajemen Operasional &bull; Eselon IV</span>
                    <div class="card-title-compact">Kepala Subbagian Umum</div>
                    <div class="card-name-compact">Muhammad Rizki Nasution, S.H</div>
                    <div class="card-nip-compact">NIP. 19810412 201101 1 006</div>
                </div>

                <!-- SUB-UNIT BIDANG TUGAS DI BAWAH SUBBAG UMUM -->
                <div class="sub-units-grid">
                    
                    <!-- 1. KEUANGAN, ANGGARAN & BMN -->
                    <div class="sub-unit-card">
                        <div class="sub-unit-header">
                            <span class="sub-unit-title">Keuangan, BMN &amp; Pengadaan</span>
                            <span class="sub-unit-count">3 Personil</span>
                        </div>
                        <div class="personil-list-wrap">
                            <div class="personil-group-block">
                                <div class="personil-group-role">Analis Pengelolaan Keuangan APBN Ahli Pertama</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Miftakhul Zahra Shofrina, S.E</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Penata Laksana Barang Terampil (BMN)</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Friska Jenifer Manurung, A.Md</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Pranata Keuangan APBN Terampil</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Efrianti Br Purba, A.Md</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. DATA, INFORMASI, IT & PERSURATAN -->
                    <div class="sub-unit-card">
                        <div class="sub-unit-header">
                            <span class="sub-unit-title">Tata Usaha, SDM &amp; TI</span>
                            <span class="sub-unit-count">5 Personil</span>
                        </div>
                        <div class="personil-list-wrap">
                            <div class="personil-group-block">
                                <div class="personil-group-role">Pengolah Data dan Informasi</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Nur Khalilah, A.Md</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Pengadministrasi Perkantoran</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Syamsuddin</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Penata Kelola Sistem &amp; TI</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Rizal Ofgani Purba, S.T</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Ridwan Hermawan Syah, S.T</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Muhammad Abi Muzaki, S.Kom</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. PENATA LAYANAN OPERASIONAL & SARPRAS -->
                    <div class="sub-unit-card">
                        <div class="sub-unit-header">
                            <span class="sub-unit-title">Layanan Operasional &amp; Sarpras</span>
                            <span class="sub-unit-count">12 Personil</span>
                        </div>
                        <div class="personil-list-wrap">
                            <div class="personil-group-block">
                                <div class="personil-group-role">Penata Layanan Operasional</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Indria Primiaty, S.Si, M.M</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Frida Simorangkir, S.K.M</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Melva Septika, S.K.M</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Tri Yudika, S.K.M</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Royto Siagian, S.E</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Irpan Subhan, S.K.M</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Sri Juli Indiyati, S.K.M</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Penelaah Teknis Kebijakan</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Rina Agustin, S.Pd</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Hasmela Revi, M.Kes</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Teknisi Sarana dan Prasarana</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Dimas Anggit B, S.T</div>
                                    <div class="personil-group-name"><span class="personil-dot"></span> Zeffry, S.T</div>
                                </div>
                            </div>
                            <div class="personil-group-block">
                                <div class="personil-group-role">Operator Layanan Operasional</div>
                                <div class="personil-group-names">
                                    <div class="personil-group-name"><span class="personil-dot"></span> Dedy Haryandy</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- KETERANGAN REGULASI DASAR -->
    <div class="org-keterangan">
        <strong>DASAR HUKUM ORGANISASI &amp; TUGAS POKOK</strong><br>
        Sesuai <strong>Pasal 47 Permenaker Nomor 1 Tahun 2022</strong>, Balai Keselamatan dan Kesehatan Kerja (K3) Medan adalah Unit Pelaksana Teknis (UPT) Kementerian Ketenagakerjaan RI yang bertugas melaksanakan pengujian lingkungan kerja, pemeriksaan kesehatan kerja, pengkajian, bimbingan teknis, dan sertifikasi K3. Struktur Balai terdiri atas Subbagian Umum dan Kelompok Jabatan Fungsional dengan total kekuatan 43 personil aparatur negara.
    </div>

    <!-- ==========================================================================
         TABEL REKAPITULASI DATA PERSONIL (COMPACT TABULAR DATA)
         ========================================================================== -->
    <div class="data-wrapper" id="orgDataView">

        <div class="tables-grid">
            
            <!-- TABEL 1: JABATAN -->
            <div>
                <h2 class="table-title">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    <span>Menurut Jenjang Jabatan</span>
                </h2>
                <table class="data-table">
                    <thead>
                        <tr><th>No</th><th>Klasifikasi Jabatan</th><th>Jumlah</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td><strong>Eselon III</strong> &ndash; Kepala Balai</td><td>1 orang</td></tr>
                        <tr><td>2</td><td><strong>Eselon IV</strong> &ndash; Kepala Subbagian Umum</td><td>1 orang</td></tr>
                        <tr><td>3</td><td><strong>Fungsional Penguji K3</strong> (Madya, Muda, Pertama)</td><td>16 orang</td></tr>
                        <tr><td>4</td><td><strong>Fungsional Lainnya</strong> (Arsiparis, Prakom, Labkes, Keuangan, BMN)</td><td>7 orang</td></tr>
                        <tr><td>5</td><td><strong>Jabatan Pelaksana &amp; Operasional</strong></td><td>18 orang</td></tr>
                    </tbody>
                    <tfoot>
                        <tr><td colspan="2">Total Pegawai &amp; PPPK</td><td>43 orang</td></tr>
                    </tfoot>
                </table>
            </div>

            <!-- TABEL 2: GOLONGAN -->
            <div>
                <h2 class="table-title">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <span>Menurut Golongan / Pangkat</span>
                </h2>
                <table class="data-table">
                    <thead>
                        <tr><th>No</th><th>Pangkat / Golongan</th><th>Jumlah</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Golongan IV (Pembina IV/a)</td><td>4 orang</td></tr>
                        <tr><td>2</td><td>Golongan III (Penata Tk I, Penata, Penata Muda)</td><td>27 orang</td></tr>
                        <tr><td>3</td><td>Golongan II (Pengatur II/c)</td><td>4 orang</td></tr>
                        <tr><td>4</td><td>PPPK (Golongan IX, VII &amp; Lainnya)</td><td>8 orang</td></tr>
                    </tbody>
                    <tfoot>
                        <tr><td colspan="2">Total Pegawai &amp; PPPK</td><td>43 orang</td></tr>
                    </tfoot>
                </table>
            </div>

            <!-- TABEL 3: PENDIDIKAN -->
            <div>
                <h2 class="table-title">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    <span>Menurut Tingkat Pendidikan</span>
                </h2>
                <table class="data-table">
                    <thead>
                        <tr><th>No</th><th>Jenjang Pendidikan</th><th>Jumlah</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Pasca Sarjana (S2) &amp; Profesi Dokter</td><td>10 orang</td></tr>
                        <tr><td>2</td><td>Sarjana (S1 / D4)</td><td>25 orang</td></tr>
                        <tr><td>3</td><td>Diploma (D3)</td><td>5 orang</td></tr>
                        <tr><td>4</td><td>SLTA / Sederajat</td><td>3 orang</td></tr>
                    </tbody>
                    <tfoot>
                        <tr><td colspan="2">Total</td><td>43 orang</td></tr>
                    </tfoot>
                </table>
            </div>

            <!-- TABEL 4: JENIS KELAMIN -->
            <div>
                <h2 class="table-title">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                    <span>Komposisi Gender</span>
                </h2>
                <table class="data-table">
                    <thead>
                        <tr><th>No</th><th>Jenis Kelamin</th><th>Jumlah</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Laki-laki</td><td>23 orang (53.5%)</td></tr>
                        <tr><td>2</td><td>Perempuan</td><td>20 orang (46.5%)</td></tr>
                    </tbody>
                    <tfoot>
                        <tr><td colspan="2">Total</td><td>43 orang (100%)</td></tr>
                    </tfoot>
                </table>
            </div>

        </div>

    </div>

</div>

<script>
function switchOrgView(view) {
    const chartView = document.getElementById('orgChartView');
    const dataView = document.getElementById('orgDataView');
    const tabChartBtn = document.getElementById('tabChartBtn');
    const tabDataBtn = document.getElementById('tabDataBtn');

    if (view === 'chart') {
        chartView.style.display = 'block';
        dataView.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        tabChartBtn.classList.add('active');
        tabDataBtn.classList.remove('active');
    } else {
        dataView.scrollIntoView({ behavior: 'smooth', block: 'start' });
        tabDataBtn.classList.add('active');
        tabChartBtn.classList.remove('active');
    }
}
</script>


@endsection
