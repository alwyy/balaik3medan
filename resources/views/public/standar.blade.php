@extends('layouts.app')

@section('content')
﻿<style>
/* ==========================================================================
   STANDAR PELAYANAN & REGULASI ORGANISASI (PERMENAKER NO. 1 TAHUN 2022)
   ========================================================================== */
.standar-page-wrapper {
    position: relative;
    padding: 24px 20px 70px;
    background: var(--color-bg, #f8fafc);
    overflow: hidden;
    min-height: calc(100vh - 180px);
}

/* Dekorasi Garis Abstrak (Monochrome Navy Opacity) */
.standar-decor {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    user-select: none;
    opacity: 0.14;
    transition: opacity 0.3s ease;
}

.standar-decor.decor-top-left {
    top: -40px;
    left: -70px;
    width: 440px;
    max-width: 36vw;
    height: auto;
    transform: rotate(-14deg);
}

.standar-decor.decor-bottom-right {
    bottom: -60px;
    right: -80px;
    width: 500px;
    max-width: 40vw;
    height: auto;
    transform: rotate(166deg) scaleX(-1);
}

.standar-decor-img {
    width: 100%;
    height: auto;
    display: block;
}

.standar-container {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* Hero Header */
.standar-header {
    text-align: center;
    max-width: 860px;
    margin: 0 auto 36px;
}

.standar-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(9, 55, 125, 0.08);
    border: 1px solid rgba(9, 55, 125, 0.18);
    color: var(--color-primary, #09377D);
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    margin-bottom: 14px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.standar-title {
    font-size: 32px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    letter-spacing: -0.01em;
    margin: 0 0 12px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    line-height: 1.25;
}

.standar-subtitle {
    font-size: 15.5px;
    line-height: 1.65;
    color: var(--color-text-muted, #475569);
    margin: 0 0 24px;
}

/* Key Highlights Cards (4 Ringkasan Inti) */
.standar-highlights {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 34px;
}

.highlight-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-md, 12px);
    padding: 18px 20px;
    box-shadow: 0 2px 10px rgba(15, 23, 42, 0.04);
    display: flex;
    flex-direction: column;
    gap: 6px;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
}

.highlight-card:hover {
    transform: translateY(-2px);
    border-color: rgba(9, 55, 125, 0.3);
    box-shadow: 0 8px 20px rgba(9, 55, 125, 0.08);
}

.highlight-card-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: rgba(9, 55, 125, 0.08);
    color: var(--color-primary, #09377D);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 4px;
}

.highlight-card-title {
    font-size: 13px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    text-transform: uppercase;
    letter-spacing: 0.04em;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    margin: 0;
}

.highlight-card-desc {
    font-size: 13.5px;
    font-weight: 600;
    color: var(--color-text-body, #1e293b);
    margin: 0;
    line-height: 1.4;
}

/* Banner Sorotan Khusus Bidang K3 (Balai K3 Medan) */
.k3-featured-banner {
    background: linear-gradient(135deg, rgba(9, 55, 125, 0.06), rgba(95, 186, 226, 0.12));
    border: 1.5px solid rgba(9, 55, 125, 0.22);
    border-radius: var(--radius-xl, 16px);
    padding: 24px 28px;
    margin-bottom: 34px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    box-shadow: 0 4px 16px rgba(9, 55, 125, 0.05);
}

.k3-featured-content {
    display: flex;
    align-items: flex-start;
    gap: 18px;
}

.k3-featured-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: var(--color-primary, #09377D);
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(9, 55, 125, 0.25);
}

.k3-featured-text h3 {
    font-size: 17px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    margin: 0 0 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.k3-featured-text p {
    font-size: 14px;
    line-height: 1.6;
    color: var(--color-text-body, #334155);
    margin: 0;
}

.k3-featured-action {
    flex-shrink: 0;
}

.k3-featured-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--color-primary, #09377D);
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: var(--radius-md, 8px);
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 4px 12px rgba(9, 55, 125, 0.2);
}

.k3-featured-btn:hover {
    background: #124b9e;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(9, 55, 125, 0.25);
}

/* Control Bar: Search & Filter Tabs */
.standar-controls {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 14px);
    padding: 18px 22px;
    margin-bottom: 28px;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
}

.standar-search-row {
    position: relative;
    margin-bottom: 16px;
}

.standar-search-input {
    width: 100%;
    padding: 12px 16px 12px 44px;
    border: 1.5px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-md, 10px);
    font-size: 14.5px;
    background: #f8fafc;
    color: var(--color-text-body, #0f172a);
    font-family: inherit;
    transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
    box-sizing: border-box;
}

.standar-search-input:focus {
    outline: none;
    background: #ffffff;
    border-color: var(--color-primary, #09377D);
    box-shadow: 0 0 0 3px rgba(9, 55, 125, 0.12);
}

.standar-search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    pointer-events: none;
    display: inline-flex;
}

/* Filter Tabs */
.standar-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    align-items: center;
}

.filter-tab {
    background: #f1f5f9;
    border: 1px solid transparent;
    color: var(--color-text-muted, #475569);
    padding: 7px 14px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.2s ease;
    user-select: none;
}

.filter-tab:hover {
    background: #e2e8f0;
    color: var(--color-text-body, #0f172a);
}

.filter-tab.active {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    border-color: var(--color-primary, #09377D);
    box-shadow: 0 2px 8px rgba(9, 55, 125, 0.25);
}

.filter-tab.tab-k3-special {
    background: rgba(9, 55, 125, 0.1);
    color: var(--color-primary, #09377D);
    border: 1px solid rgba(9, 55, 125, 0.25);
}

.filter-tab.tab-k3-special.active {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    border-color: var(--color-primary, #09377D);
}

/* Grid Layout Daftar Pasal */
.pasal-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
    margin-bottom: 40px;
}

.pasal-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-lg, 12px);
    padding: 20px 22px;
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    display: flex;
    flex-direction: column;
    gap: 10px;
    position: relative;
}

.pasal-card:hover {
    transform: translateY(-2px);
    border-color: rgba(9, 55, 125, 0.3);
    box-shadow: 0 8px 24px rgba(9, 55, 125, 0.08);
}

/* Aksen Spesial untuk Pasal K3 */
.pasal-card.k3-accent {
    border-left: 4.5px solid var(--color-primary, #09377D);
    background: linear-gradient(180deg, #ffffff 0%, rgba(240, 246, 255, 0.35) 100%);
}

.pasal-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

.pasal-badge {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    letter-spacing: 0.02em;
    display: inline-block;
}

.pasal-category-tag {
    font-size: 11.5px;
    font-weight: 600;
    color: #475569;
    background: #f1f5f9;
    padding: 3px 8px;
    border-radius: 4px;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.pasal-card.k3-accent .pasal-category-tag {
    background: rgba(9, 55, 125, 0.1);
    color: var(--color-primary, #09377D);
}

.pasal-card-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0;
    line-height: 1.35;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.pasal-card-desc {
    font-size: 14px;
    line-height: 1.65;
    color: var(--color-text-body, #334155);
    margin: 0;
}

/* State Pencarian Kosong */
.pasal-empty-state {
    display: none;
    text-align: center;
    padding: 50px 20px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px dashed var(--color-border, #cbd5e1);
    grid-column: 1 / -1;
}

.pasal-empty-state h4 {
    font-size: 17px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 10px 0 6px;
}

.pasal-empty-state p {
    font-size: 14px;
    color: #64748b;
    margin: 0;
}

/* Card Rujukan Unduh Dokumen Resmi */
.regulation-download-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 16px);
    padding: 28px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
    border-top: 4px solid var(--color-primary, #09377D);
}

.download-card-info {
    display: flex;
    align-items: flex-start;
    gap: 18px;
}

.download-card-icon {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    background: rgba(9, 55, 125, 0.08);
    color: var(--color-primary, #09377D);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.download-card-text h4 {
    font-size: 17px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0 0 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.download-card-text p {
    font-size: 14px;
    line-height: 1.55;
    color: var(--color-text-body, #475569);
    margin: 0;
}

.download-btn {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: var(--color-primary, #09377D);
    color: #ffffff;
    padding: 11px 20px;
    border-radius: 8px;
    font-size: 13.5px;
    font-weight: 700;
    text-decoration: none;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(9, 55, 125, 0.2);
}

.download-btn:hover {
    background: #124b9e;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(9, 55, 125, 0.28);
}

/* Responsive Breakpoints */
@media (max-width: 992px) {
    .standar-highlights {
        grid-template-columns: repeat(2, 1fr);
    }

    .k3-featured-banner {
        flex-direction: column;
        align-items: flex-start;
    }

    .regulation-download-card {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 768px) {
    .standar-page-wrapper {
        padding: 16px 14px 50px;
    }

    .standar-title {
        font-size: 24px;
    }

    .standar-subtitle {
        font-size: 14px;
    }

    .standar-highlights {
        grid-template-columns: 1fr;
    }

    .pasal-grid {
        grid-template-columns: 1fr;
    }

    .standar-controls {
        padding: 14px 16px;
    }
}
</style>

<div class="standar-page-wrapper">

    <!-- DEKORASI LINE ABSTRACT (KIRI ATAS & KANAN BAWAH) -->
    <div class="standar-decor decor-top-left" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="standar-decor-img">
    </div>

    <div class="standar-decor decor-bottom-right" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="standar-decor-img">
    </div>

    <div class="standar-container">

        <!-- HEADER & HERO SUMMARY -->
        <header class="standar-header">
            <h1 class="standar-title">Standar Pelayanan &amp; Tata Kerja Organisasi</h1>
            <p class="standar-subtitle">
                Ringkasan sistematis Peraturan Menteri Ketenagakerjaan RI No. 1 Tahun 2022 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis (UPT) di lingkungan Kementerian Ketenagakerjaan Republik Indonesia.
            </p>
        </header>

        <!-- 4 HIGHLIGHT CARDS -->
        <div class="standar-highlights">
            <div class="highlight-card">
                <div class="highlight-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <h4 class="highlight-card-title">Dasar Hukum</h4>
                <p class="highlight-card-desc">Permenaker No. 1 Tahun 2022</p>
            </div>

            <div class="highlight-card">
                <div class="highlight-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <h4 class="highlight-card-title">Klasifikasi UPT</h4>
                <p class="highlight-card-desc">Balai K3 Regional Medan</p>
            </div>

            <div class="highlight-card">
                <div class="highlight-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M3 9h18M9 21V9"/>
                    </svg>
                </div>
                <h4 class="highlight-card-title">Struktur Regulasi</h4>
                <p class="highlight-card-desc">68 Pasal Terverifikasi</p>
            </div>

            <div class="highlight-card">
                <div class="highlight-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                    </svg>
                </div>
                <h4 class="highlight-card-title">Akuntabilitas</h4>
                <p class="highlight-card-desc">SPIP &amp; Pengawasan Mutu ISO</p>
            </div>
        </div>

        <!-- BANNER SOROTAN KHUSUS BIDANG K3 (PASAL 36 - 49) -->
        <div class="k3-featured-banner">
            <div class="k3-featured-content">
                <div class="k3-featured-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </div>
                <div class="k3-featured-text">
                    <h3>Dasar Hukum Utama: UPT Bidang Keselamatan &amp; Kesehatan Kerja (Pasal 36 &ndash; 49)</h3>
                    <p>
                        Pasal 36 s/d 49 menetapkan kedudukan resmi, struktur organisasi, wilayah kerja, serta tugas pokok <strong>Balai K3 Medan</strong> dalam pengujian teknis lingkungan kerja, kalibrasi instrumen, pemeriksaan kesehatan kerja, dan bimbingan teknis K3 regional.
                    </p>
                </div>
            </div>
            <div class="k3-featured-action">
                <button type="button" class="k3-featured-btn" id="btnFilterK3Direct">
                    Lihat Pasal Bidang K3 &rarr;
                </button>
            </div>
        </div>

        <!-- CONTROLS: SEARCH & TABS FILTER -->
        <div class="standar-controls">
            <!-- Pencarian Cepat -->
            <div class="standar-search-row">
                <span class="standar-search-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </span>
                <input type="text" id="standarSearchInput" class="standar-search-input" placeholder="Cari nomor pasal atau kata kunci (contoh: K3, pengujian, akuntabilitas, kalibrasi, jabatan)..." autocomplete="off">
            </div>

            <!-- Tab Kategori -->
            <div class="standar-tabs">
                <button type="button" class="filter-tab active" data-filter="all">Semua (68 Pasal)</button>
                <button type="button" class="filter-tab tab-k3-special" data-filter="k3" id="tabFilterK3">★ Fokus Bidang K3 (Pasal 36 &ndash; 49)</button>
                <button type="button" class="filter-tab" data-filter="umum">Ketentuan Umum (Pasal 1)</button>
                <button type="button" class="filter-tab" data-filter="vokasi">Pelatihan Vokasi (Pasal 2 &ndash; 21)</button>
                <button type="button" class="filter-tab" data-filter="kesempatan">Kesempatan Kerja (Pasal 22 &ndash; 35)</button>
                <button type="button" class="filter-tab" data-filter="tatakerja">Tata Kerja &amp; Fungsional (Pasal 50 &ndash; 59)</button>
                <button type="button" class="filter-tab" data-filter="penutup">Ketentuan Penutup (Pasal 60 &ndash; 68)</button>
            </div>
        </div>

        <!-- GRID DAFTAR PASAL TERSTRUKTUR -->
        <div class="pasal-grid" id="pasalGrid">

            <!-- KLASTER 1: KETENTUAN UMUM -->
            <div class="pasal-card" data-category="umum" data-keywords="definisi istilah unit pelaksana teknis upt wilayah kerja kementerian menteri">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 1</span>
                    <span class="pasal-category-tag">Ketentuan Umum</span>
                </div>
                <h3 class="pasal-card-title">Definisi &amp; Istilah Pokok Organisasi</h3>
                <p class="pasal-card-desc">
                    Mengatur pengertian dan batasan definisi istilah penting, mencakup Unit Pelaksana Teknis (UPT), pembagian wilayah kerja kedinasan, struktur Kementerian Ketenagakerjaan, dan wewenang Menteri.
                </p>
            </div>

            <!-- KLASTER 2: PELATIHAN VOKASI & PRODUKTIVITAS -->
            <div class="pasal-card" data-category="vokasi" data-keywords="pelatihan vokasi produktivitas binalavotas balai besar kelas I II klasifikasi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 2 &ndash; 3</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Kedudukan &amp; Klasifikasi UPT Pelatihan Vokasi</h3>
                <p class="pasal-card-desc">
                    Menetapkan kedudukan UPT Bidang Pelatihan Vokasi dan Produktivitas di bawah naungan Ditjen Binalavotas dengan klasifikasi: Balai Besar, Balai Kelas I, dan Balai Kelas II.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="tugas fungsi balai besar pelatihan vokasi produktivitas sertifikasi kompetensi uji coba konsultansi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 4 &ndash; 5</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Tugas &amp; Fungsi Balai Besar Pelatihan Vokasi</h3>
                <p class="pasal-card-desc">
                    Mengatur pelaksanaan program pelatihan vokasi, penguatan produktivitas, uji kompetensi dan sertifikasi, pengembangan metode inovasi pelatihan, konsultansi, serta perluasan jejaring kemitraan.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="susunan organisasi struktur bagian umum jabatan fungsional balai besar vokasi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 6 &ndash; 9</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Susunan Organisasi Balai Besar Pelatihan Vokasi</h3>
                <p class="pasal-card-desc">
                    Mengatur susunan organisasi Balai Besar Pelatihan Vokasi yang mencakup Bagian Umum, Subbagian Tata Usaha, dan Kelompok Jabatan Fungsional instruktur/asesor.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="lokasi balai besar vokasi medan serang bekasi bandung semarang makassar">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 10</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Penetapan Lokasi Balai Besar Pelatihan Vokasi</h3>
                <p class="pasal-card-desc">
                    Menetapkan sebaran lokasi resmi Balai Besar Pelatihan Vokasi dan Produktivitas di kota Medan, Serang, Bekasi, Bandung, Semarang, dan Makassar.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="tugas fungsi balai kelas I pelatihan vokasi sertifikasi kompetensi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 11 &ndash; 12</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Tugas &amp; Fungsi Balai Pelatihan Vokasi Kelas I</h3>
                <p class="pasal-card-desc">
                    Mengatur pelaksanaan pelatihan keterampilan vokasi, sertifikasi kompetensi kerja, layanan konsultansi teknis, dan penguatan jejaring kemitraan industri tingkat provinsi.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="susunan organisasi balai kelas I subbagian umum fungsional">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 13 &ndash; 14</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Susunan Organisasi Balai Kelas I</h3>
                <p class="pasal-card-desc">
                    Mengatur struktur tata kelola Balai Kelas I yang terdiri atas Subbagian Umum dan Kelompok Jabatan Fungsional pelaksana teknis pelatihan.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="lokasi balai pelatihan vokasi kelas I">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 15</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Penetapan Lokasi Balai Pelatihan Vokasi Kelas I</h3>
                <p class="pasal-card-desc">
                    Menetapkan wilayah kerja dan lokasi administratif penempatan Balai Pelatihan Vokasi dan Produktivitas Kelas I di berbagai provinsi di Indonesia.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="tugas fungsi susunan balai kelas II pelatihan vokasi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 16 &ndash; 20</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Tugas, Organisasi &amp; Lokasi Balai Kelas II</h3>
                <p class="pasal-card-desc">
                    Mengatur rincian tugas operasional, susunan organisasi, tata kerja, serta penetapan lokasi Balai Pelatihan Vokasi dan Produktivitas Kelas II.
                </p>
            </div>

            <div class="pasal-card" data-category="vokasi" data-keywords="satuan pelayanan satpel nonstruktural jangkauan layanan vokasi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 21</span>
                    <span class="pasal-category-tag">Pelatihan Vokasi</span>
                </div>
                <h3 class="pasal-card-title">Satuan Pelayanan Nonstruktural</h3>
                <p class="pasal-card-desc">
                    Mengatur dasar pembentukan Satuan Pelayanan (Satpel) sebagai unit kerja nonstruktural guna memperluas jangkauan akses pelatihan dan sertifikasi ke daerah.
                </p>
            </div>

            <!-- KLASTER 3: PERLUASAN KESEMPATAN KERJA -->
            <div class="pasal-card" data-category="kesempatan" data-keywords="perluasan kesempatan kerja tenaga kerja mandiri kawasan wirausaha tkm">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 22 &ndash; 30</span>
                    <span class="pasal-category-tag">Kesempatan Kerja</span>
                </div>
                <h3 class="pasal-card-title">Balai Besar Perluasan Kesempatan Kerja</h3>
                <p class="pasal-card-desc">
                    Mengatur kedudukan, tugas, fungsi pendampingan Tenaga Kerja Mandiri (TKM) lanjutan, program padat karya, model kawasan pemberdayaan, struktur Bagian Umum, dan lokasinya.
                </p>
            </div>

            <div class="pasal-card" data-category="kesempatan" data-keywords="balai perluasan kesempatan kerja tkm pemula rintisan wirausaha">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 31 &ndash; 35</span>
                    <span class="pasal-category-tag">Kesempatan Kerja</span>
                </div>
                <h3 class="pasal-card-title">Balai Perluasan Kesempatan Kerja</h3>
                <p class="pasal-card-desc">
                    Mengatur tugas inkubasi bisnis dan penciptaan tenaga kerja mandiri pemula, tata kelola susunan organisasi unit kerja, dan penetapan wilayah kerjanya.
                </p>
            </div>

            <!-- KLASTER 4: KESELAMATAN & KESEHATAN KERJA (K3) - FOKUS BALAI K3 MEDAN -->
            <div class="pasal-card k3-accent" data-category="k3" data-keywords="kedudukan klasifikasi upt k3 balai besar k3 balai k3 binwasnaker">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 36 &ndash; 37</span>
                    <span class="pasal-category-tag">Regulasi Inti K3</span>
                </div>
                <h3 class="pasal-card-title">Kedudukan &amp; Klasifikasi UPT Bidang K3</h3>
                <p class="pasal-card-desc">
                    Menetapkan bahwa UPT Bidang Keselamatan dan Kesehatan Kerja berada langsung di bawah Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan dan K3, diklasifikasikan menjadi: <strong>Balai Besar K3</strong> dan <strong>Balai K3 Regional</strong>.
                </p>
            </div>

            <div class="pasal-card k3-accent" data-category="k3" data-keywords="tugas fungsi balai besar k3 pengujian kalibrasi kesehatan kerja ergonomi konsultansi">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 38 &ndash; 39</span>
                    <span class="pasal-category-tag">Regulasi Inti K3</span>
                </div>
                <h3 class="pasal-card-title">Tugas &amp; Fungsi Balai Besar K3</h3>
                <p class="pasal-card-desc">
                    Mengatur penyelenggaraan pengujian teknis faktor fisika, kimia, biologi, ergonomi, keselamatan kerja, pengujian kesehatan tenaga kerja, kalibrasi instrumen laboratorium, serta layanan konsultansi K3 rujukan nasional.
                </p>
            </div>

            <div class="pasal-card k3-accent" data-category="k3" data-keywords="susunan organisasi balai besar k3 bagian umum jakarta">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 40 &ndash; 44</span>
                    <span class="pasal-category-tag">Regulasi Inti K3</span>
                </div>
                <h3 class="pasal-card-title">Struktur Organisasi &amp; Lokasi Balai Besar K3</h3>
                <p class="pasal-card-desc">
                    Mengatur susunan organisasi Balai Besar K3 (Bagian Umum, Subbagian Tata Usaha, Tim Kerja Teknis, dan Jabatan Fungsional Penguji K3) serta penetapan kedudukan di DKI Jakarta.
                </p>
            </div>

            <div class="pasal-card k3-accent" data-category="k3" data-keywords="tugas fungsi balai k3 medan regional pengujian lingkungan kerja kesehatan kerja ergonomi keselamatan kerja">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 45 &ndash; 46</span>
                    <span class="pasal-category-tag">Regulasi Balai K3 Medan</span>
                </div>
                <h3 class="pasal-card-title">Tugas &amp; Fungsi Balai K3 Regional Medan</h3>
                <p class="pasal-card-desc">
                    Menjadi payung hukum langsung pelaksanaan pengujian lingkungan kerja (NAB faktor fisika &amp; kimia), pemeriksaan kesehatan kerja tenaga kerja, identifikasi ergonomi &amp; keselamatan instalasi, serta konsultansi teknis di wilayah kerja regional.
                </p>
            </div>

            <div class="pasal-card k3-accent" data-category="k3" data-keywords="susunan organisasi balai k3 kepala balai subbagian tata usaha penguji k3 fungsional">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 47 &ndash; 48</span>
                    <span class="pasal-category-tag">Regulasi Balai K3 Medan</span>
                </div>
                <h3 class="pasal-card-title">Susunan Organisasi Balai K3 Regional</h3>
                <p class="pasal-card-desc">
                    Mengatur struktur tata kelola Balai K3 yang terdiri atas: <strong>Kepala Balai</strong>, <strong>Subbagian Tata Usaha</strong> (administrasi, keuangan &amp; kepegawaian), dan <strong>Kelompok Jabatan Fungsional Penguji K3</strong>.
                </p>
            </div>

            <div class="pasal-card k3-accent" data-category="k3" data-keywords="lokasi balai k3 medan bandung surabaya surakarta samarinda makassar">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 49</span>
                    <span class="pasal-category-tag">Wilayah Kerja K3</span>
                </div>
                <h3 class="pasal-card-title">Penetapan Lokasi Resmi Balai K3 di Indonesia</h3>
                <p class="pasal-card-desc">
                    Menetapkan 6 Balai K3 Regional di Indonesia: <strong>Balai K3 Medan</strong> (membawahi wilayah Sumatera), Bandung, Surabaya, Surakarta, Samarinda, dan Makassar.
                </p>
            </div>

            <!-- KLASTER 5: JABATAN FUNGSIONAL & TATA KERJA -->
            <div class="pasal-card" data-category="tatakerja" data-keywords="kelompok jabatan fungsional penguji k3 instruktur pengantar kerja formasi analisis beban kerja">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 50 &ndash; 52</span>
                    <span class="pasal-category-tag">Jabatan Fungsional</span>
                </div>
                <h3 class="pasal-card-title">Kelompok Jabatan Fungsional UPT</h3>
                <p class="pasal-card-desc">
                    Mengatur kedudukan pejabat fungsional (Penguji K3, Analis Kebijakan, Pengelola Pengadaan), penjenjangan karir, kompetensi profesi, dan penetapan formasi berdasarkan Analisis Beban Kerja (ABK).
                </p>
            </div>

            <div class="pasal-card" data-category="tatakerja" data-keywords="tata kerja akuntabilitas koordinasi pengawasan spip sistem pengendalian internal">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 53 &ndash; 59</span>
                    <span class="pasal-category-tag">Tata Kerja &amp; SPIP</span>
                </div>
                <h3 class="pasal-card-title">Tata Kerja, Akuntabilitas &amp; Sistem Pengendalian Internal</h3>
                <p class="pasal-card-desc">
                    Mengatur prinsip kerja koordinatif dan hierarkis, pelaporan berkala berjenjang, kepatuhan audit kinerja, serta kewajiban implementasi Sistem Pengendalian Internal Pemerintah (SPIP) di lingkungan UPT.
                </p>
            </div>

            <!-- KLASTER 6: KETENTUAN JABATAN, PERALIHAN & PENUTUP -->
            <div class="pasal-card" data-category="penutup" data-keywords="ketentuan jabatan eselon struktural pengangkatan pemberhentian pejabat">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 60 &ndash; 61</span>
                    <span class="pasal-category-tag">Ketentuan Jabatan</span>
                </div>
                <h3 class="pasal-card-title">Pengangkatan &amp; Pemberhentian Pejabat UPT</h3>
                <p class="pasal-card-desc">
                    Mengatur jenjang eselon jabatan struktural (Kepala UPT &amp; Kasubbag TU) serta mekanisme pengangkatan dan pemberhentian aparatur sesuai regulasi kepegawaian aparatur sipil negara.
                </p>
            </div>

            <div class="pasal-card" data-category="penutup" data-keywords="ketentuan lain lampiran nomenklatur wilayah kerja peta">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 62 &ndash; 63</span>
                    <span class="pasal-category-tag">Ketentuan Lain-lain</span>
                </div>
                <h3 class="pasal-card-title">Lampiran Nomenklatur &amp; Wilayah Kerja</h3>
                <p class="pasal-card-desc">
                    Mengatur bahwa peta rincian wilayah kerja, bagan struktur organisasi, dan nomenklatur jabatan UPT merupakan bagian lampiran yang mengikat dari Peraturan Menteri.
                </p>
            </div>

            <div class="pasal-card" data-category="penutup" data-keywords="ketentuan peralihan peraturan sebelumnya keberlanjutan tugas upt">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 64 &ndash; 65</span>
                    <span class="pasal-category-tag">Ketentuan Peralihan</span>
                </div>
                <h3 class="pasal-card-title">Ketentuan Peralihan Operasional</h3>
                <p class="pasal-card-desc">
                    Menjamin kepastian hukum bahwa seluruh operasional pelayanan dan penugasan aparatur tetap berjalan secara sah selama penyesuaian menuju struktur tata kerja yang baru.
                </p>
            </div>

            <div class="pasal-card" data-category="penutup" data-keywords="ketentuan penutup pencabutan peraturan lama berlaku resmi permenaker">
                <div class="pasal-card-header">
                    <span class="pasal-badge">Pasal 66 &ndash; 68</span>
                    <span class="pasal-category-tag">Ketentuan Penutup</span>
                </div>
                <h3 class="pasal-card-title">Pencabutan Aturan Lama &amp; Mulai Berlaku</h3>
                <p class="pasal-card-desc">
                    Mencabut Permenaker No. 13 Tahun 2015 serta menyatakan Peraturan Menteri Ketenagakerjaan No. 1 Tahun 2022 resmi diundangkan dan berkekuatan hukum penuh.
                </p>
            </div>

            <!-- Empty Search State -->
            <div class="pasal-empty-state" id="pasalEmptyState">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    <line x1="8" y1="11" x2="14" y2="11"/>
                </svg>
                <h4>Pasal atau Kata Kunci Tidak Ditemukan</h4>
                <p>Coba gunakan kata kunci lain seperti: "K3", "pengujian", "kalibrasi", atau klik tombol kategori di atas.</p>
            </div>

        </div>

        <!-- RUJUKAN DOKUMEN RESMI / UNDUH CTA -->
        <div class="regulation-download-card">
            <div class="download-card-info">
                <div class="download-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>
                <div class="download-card-text">
                    <h4>Dokumen Resmi Permenaker No. 1 Tahun 2022</h4>
                    <p>
                        Salinan resmi Naskah Peraturan Menteri Ketenagakerjaan RI lengkap dengan lampiran struktur bagan organisasi dan peta wilayah kerja dapat diakses melalui portal JDIH Kemnaker.
                    </p>
                </div>
            </div>
            <a href="https://jdih.kemnaker.go.id" target="_blank" rel="noopener noreferrer" class="download-btn">
                <span>Akses Portal JDIH Kemnaker</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15 3 21 3 21 9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
            </a>
        </div>

    </div>
</div>

<!-- SCRIPT FILTER & LIVE SEARCH -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('standarSearchInput');
    const tabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.pasal-card');
    const emptyState = document.getElementById('pasalEmptyState');
    const btnDirectK3 = document.getElementById('btnFilterK3Direct');
    const tabFilterK3 = document.getElementById('tabFilterK3');

    let currentFilter = 'all';

    function applyFilterAndSearch() {
        const query = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        cards.forEach(card => {
            const category = card.getAttribute('data-category');
            const keywords = (card.getAttribute('data-keywords') || '').toLowerCase();
            const textContent = card.innerText.toLowerCase();

            // Cek kecocokan kategori tab
            const matchesCategory = (currentFilter === 'all') || (category === currentFilter);

            // Cek kecocokan teks pencarian
            const matchesSearch = !query || textContent.includes(query) || keywords.includes(query);

            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (emptyState) {
            emptyState.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    // Event Tab Click
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.getAttribute('data-filter');
            applyFilterAndSearch();
        });
    });

    // Event Input Search (Instant Filter)
    if (searchInput) {
        searchInput.addEventListener('input', applyFilterAndSearch);
    }

    // Tombol Cepat Banner K3
    if (btnDirectK3 && tabFilterK3) {
        btnDirectK3.addEventListener('click', function() {
            tabFilterK3.click();
            tabFilterK3.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    }
});
</script>

@endsection
