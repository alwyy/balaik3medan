@extends('layouts.app')

@section('content')
<style>
.tugas-wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 35px 20px 60px;
}

/* ==========================================================================
   HEADER SECTION
   ========================================================================== */
.tugas-header-area {
    text-align: center;
    margin-bottom: 32px;
}

.tugas-header-area h1 {
    font-size: 28px;
    color: var(--color-primary, #09377D);
    margin: 0 0 8px;
    font-weight: 700;
    letter-spacing: -0.01em;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.tugas-header-subtitle {
    font-size: 14.5px;
    color: #64748b;
    max-width: 620px;
    margin: 0 auto;
    line-height: 1.5;
}

/* ==========================================================================
   KONTEN UTAMA: TUGAS & FUNGSI (2 KOLOM)
   ========================================================================== */
.content-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.15fr;
    gap: 32px;
    align-items: start;
    margin-bottom: 45px;
}

.image-frame {
    background: #ffffff;
    padding: 12px;
    border-radius: var(--radius-xl, 16px);
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
}

.image-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.image-grid-item {
    width: 100%;
    aspect-ratio: 16 / 10;
    border-radius: var(--radius-lg, 10px);
    overflow: hidden;
    background: #f1f5f9;
}

.image-grid img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
}

.image-grid-item:hover img {
    transform: scale(1.02);
}

/* KOTAK INFORMASI TUGAS & FUNGSI */
.text-content {
    background: #ffffff;
    padding: 28px 26px;
    border-radius: var(--radius-xl, 16px);
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
}

.section-block {
    margin-bottom: 24px;
}

.section-block:last-child {
    margin-bottom: 0;
}

.block-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    padding-bottom: 8px;
    border-bottom: 1px solid #e2e8f0;
}

.block-icon {
    width: 26px;
    height: 26px;
    border-radius: 6px;
    background: var(--color-primary, #09377D);
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.block-header h2 {
    font-size: 18px;
    color: var(--color-primary, #09377D);
    margin: 0;
    font-weight: 700;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.block-desc {
    color: #475569;
    font-size: 13.5px;
    line-height: 1.5;
    margin: 0 0 10px;
}

/* DAFTAR BULLET DOT SENADA */
.custom-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.custom-list li {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    font-size: 14px;
    color: #334155;
    line-height: 1.45;
}

.list-dot {
    width: 5px;
    height: 5px;
    background: var(--color-primary, #09377D);
    border-radius: 50%;
    flex-shrink: 0;
    margin-top: 8px;
}

/* ==========================================================================
   SEPARATOR SECTION
   ========================================================================== */
.section-divider {
    border: 0;
    height: 1px;
    background: #e2e8f0;
    margin: 35px 0 40px;
}

/* ==========================================================================
   BAGIAN BAWAH: 3 KOLOM KEGIATAN & PELAYANAN K3
   ========================================================================== */
.bottom-section-header {
    text-align: center;
    margin-bottom: 26px;
}

.bottom-section-header h2 {
    font-size: 24px;
    color: var(--color-primary, #09377D);
    font-weight: 700;
    margin: 0 0 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.bottom-section-subtitle {
    font-size: 14px;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.5;
}

.bottom-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-bottom: 40px;
}

.bottom-kegiatan-card {
    background: #ffffff;
    border-radius: var(--radius-xl, 14px);
    overflow: hidden;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.2s ease;
    display: flex;
    flex-direction: column;
}

.bottom-kegiatan-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 51, 102, 0.08);
    border-color: #cbd5e1;
}

.bottom-card-media {
    height: 190px;
    overflow: hidden;
    background: #f1f5f9;
}

.bottom-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
}

.bottom-kegiatan-card:hover .bottom-card-media img {
    transform: scale(1.02);
}

.bottom-card-body {
    padding: 16px 18px 18px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.card-title-bottom {
    font-size: 15px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    line-height: 1.35;
    margin: 0 0 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.card-desc-bottom {
    font-size: 13.5px;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
}

/* ==========================================================================
   FOOTER NOTE
   ========================================================================== */
.page-footer-note {
    text-align: center;
    padding-top: 16px;
    font-size: 13px;
    color: #94a3b8;
    border-top: 1px solid #f1f5f9;
}

/* ==========================================================================
   RESPONSIVITAS MOBILE & TABLET
   ========================================================================== */
@media (max-width: 992px) {
    .content-wrapper {
        grid-template-columns: 1fr;
        gap: 24px;
    }
    .bottom-cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .tugas-wrapper {
        padding: 25px 14px 45px;
    }
    .tugas-header-area h1 {
        font-size: 24px;
    }
    .tugas-header-subtitle {
        font-size: 13.5px;
    }
    .text-content {
        padding: 20px 16px;
    }
    .bottom-cards-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .bottom-section-header h2 {
        font-size: 20px;
    }
    .bottom-section-subtitle {
        font-size: 13px;
    }
}
</style>

<div class="tugas-wrapper">

    <!-- ==========================================================================
         BAGIAN ATAS: TUGAS DAN FUNGSI UTAMA
         ========================================================================== -->
    <div class="tugas-header-area">
        <h1>Tugas dan Fungsi Balai K3 Medan</h1>
        <p class="tugas-header-subtitle">
            Berdasarkan Peraturan Menteri Ketenagakerjaan RI Nomor 1 Tahun 2022
        </p>
    </div>

    <!-- KONTEN 2 KOLOM (DOKUMENTASI & URAIAN TUGAS FUNGSI) -->
    <div class="content-wrapper">

        <!-- FOTO DOKUMENTASI UPT -->
        <div class="image-frame">
            <div class="image-grid">
                <div class="image-grid-item img-skeleton-wrap">
                    <img src="<?= asset('assets/kegiatan k3.jpeg') ?>" alt="Pelayanan Laboratorium Balai K3" loading="lazy">
                </div>
                <div class="image-grid-item img-skeleton-wrap">
                    <img src="<?= asset('assets/galeri8.jpeg') ?>" alt="Pemeriksaan Kesehatan Tenaga Kerja" loading="lazy">
                </div>
            </div>
        </div>

        <!-- URAIAN RESMI TUGAS & FUNGSI -->
        <div class="text-content">
            
            <!-- BLOK TUGAS -->
            <div class="section-block">
                <div class="block-header">
                    <div class="block-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h2>Tugas Pokok</h2>
                </div>
                <p class="block-desc">
                    Sesuai Pasal 45 Permenaker No. 1/2022, Balai K3 Medan mempunyai tugas melaksanakan:
                </p>
                <ul class="custom-list">
                    <li>
                        <span class="list-dot"></span>
                        <span>Pengujian keselamatan dan kesehatan kerja</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Peningkatan kapasitas dan uji kompetensi personil K3</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Pemeriksaan kesehatan kerja</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Pelayanan konsultasi K3</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Peningkatan jejaring K3</span>
                    </li>
                </ul>
            </div>

            <!-- BLOK FUNGSI -->
            <div class="section-block">
                <div class="block-header">
                    <div class="block-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    <h2>Fungsi Operasional</h2>
                </div>
                <p class="block-desc">
                    Dalam melaksanakan tugas, Balai K3 Medan menyelenggarakan fungsi:
                </p>
                <ul class="custom-list">
                    <li>
                        <span class="list-dot"></span>
                        <span>Penyusunan rencana, program, dan anggaran</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Analisis dan pengujian K3</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Peningkatan kapasitas personil K3</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Pemeriksaan kesehatan kerja</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Konsultasi dan rekomendasi K3</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Pengelolaan tata usaha, kepegawaian, dan BMN</span>
                    </li>
                    <li>
                        <span class="list-dot"></span>
                        <span>Evaluasi dan pelaporan berkala</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>

    <!-- SEPARATOR SECTION -->
    <hr class="section-divider">

    <!-- ==========================================================================
         BAGIAN BAWAH: 3 KOLOM KEGIATAN & PELAYANAN K3
         ========================================================================== -->
    <div class="bottom-section-header">
        <h2>Kegiatan dan Pelayanan K3</h2>
        <p class="bottom-section-subtitle">
            Dokumentasi pengujian lingkungan kerja, bimbingan teknis, dan kunjungan edukasi K3.
        </p>
    </div>

    <!-- GRID 3 KOLOM KARTU -->
    <div class="bottom-cards-grid">

        <!-- KARTU 1: BIMTEK -->
        <div class="bottom-kegiatan-card">
            <div class="bottom-card-media img-skeleton-wrap">
                <img src="<?= asset('assets/bimbingan teknis.jpg') ?>" alt="Bimbingan Teknis Audit Internal SMK3" loading="lazy">
            </div>
            <div class="bottom-card-body">
                <h3 class="card-title-bottom">Bimbingan Teknis Audit SMK3</h3>
                <p class="card-desc-bottom">
                    Pembinaan auditor internal SMK3 bagi personil perusahaan.
                </p>
            </div>
        </div>

        <!-- KARTU 2: FIELD TRIP & JEJARING EDUKASI -->
        <div class="bottom-kegiatan-card">
            <div class="bottom-card-media img-skeleton-wrap">
                <img src="<?= asset('assets/field trip.jpg') ?>" alt="Field Trip Mahasiswa Universitas Efarina" loading="lazy">
            </div>
            <div class="bottom-card-body">
                <h3 class="card-title-bottom">Field Trip Mahasiswa/i</h3>
                <p class="card-desc-bottom">
                    Kunjungan studi edukasi laboratorium bersama Universitas Efarina.
                </p>
            </div>
        </div>

        <!-- KARTU 3: PENGUJIAN LINGKUNGAN KERJA -->
        <div class="bottom-kegiatan-card">
            <div class="bottom-card-media img-skeleton-wrap">
                <img src="<?= asset('assets/pengujian lingkungan kerja.jpg') ?>" alt="Pengujian K3 Lingkungan Kerja Industri" loading="lazy">
            </div>
            <div class="bottom-card-body">
                <h3 class="card-title-bottom">Pengujian Lingkungan Kerja</h3>
                <p class="card-desc-bottom">
                    Pengukuran faktor fisika, kimia, dan ergonomi langsung di industri.
                </p>
            </div>
        </div>

    </div>

    <!-- FOOTER NOTE -->
    <div class="page-footer-note">
        &copy; 2026 Balai Keselamatan dan Kesehatan Kerja Medan &mdash; Kementerian Ketenagakerjaan RI
    </div>

</div>
@endsection
