@extends('layouts.app')

@section('content')
<?php
/**
 * Capaian Kinerja & Sasaran Strategis - Balai K3 Medan
 * Desain Resmi Pemerintahan (Clean, Authoritative, Minimalist Navy)
 * Bebas Data Dummy - Seluruh opsi dan konten dinamis 100% terhubung ke data riil yang dipush dari CMS.
 * Pengurangan icon berlebih: Tipografi resmi, data-first, dan responsif di semua perangkat.
 */

$meta = $bundle['meta'] ?? [];
$activeReport = $report ?? null;
$options = $options ?? [];

$hasMonthly = !empty($options['has_monthly']);
$hasYearly = !empty($options['has_yearly']);
$monthlyYears = $options['monthly_years'] ?? [];
$monthlyMap = $options['monthly_map'] ?? [];
$yearlyYears = $options['yearly_years'] ?? [];
$yearlyMap = $options['yearly_map'] ?? [];

$currentTipe = $activeTipe ?? ($options['default_tipe'] ?? 'bulanan');
$currentTahun = (int)($activeTahun ?? ($options['default_tahun'] ?? 2026));
$currentBulan = (string)($activeBulan ?? ($options['default_bulan'] ?? '01'));

$availableMonthsForCurrentYear = $monthlyMap[$currentTahun] ?? [];

$periodeLabel = $activeReport['periode_label'] ?? ($currentTipe === 'tahunan' ? 'Tahun ' . $currentTahun : 'Periode Laporan');
$badgePeriode = $activeReport['badge_periode'] ?? ($currentTipe === 'tahunan' ? 'Laporan Tahunan' : 'Laporan Bulanan');
$summary = $activeReport['ringkasan_eksekutif'] ?? [];
$kpiList = $activeReport['kpi_utama'] ?? [];
$sasaranList = $activeReport['sasaran_strategis'] ?? [];
$sebaran = $activeReport['sebaran_peserta_webinar'] ?? [];
$companies = $activeReport['perusahaan_mitra'] ?? [];
?>

<style>
/* ==========================================================================
   HALAMAN CAPAIAN KINERJA - DATA-FIRST RESMI (MINIMALIS & RESPONTIF)
   ========================================================================== */
.capaian-page-wrap {
    background: var(--color-bg, #f8fafc);
    color: var(--color-text-body, #334155);
    min-height: calc(100vh - 180px);
    padding: 24px 0 70px;
    position: relative;
    overflow: hidden;
}

/* Dekorasi Garis Halus K3 (Kiri Atas & Kanan Bawah) */
.capaian-decor {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    user-select: none;
    opacity: 0.08;
}

.capaian-decor.decor-top-left {
    top: -50px;
    left: -80px;
    width: 440px;
    max-width: 36vw;
    height: auto;
    transform: rotate(-14deg);
}

.capaian-decor.decor-bottom-right {
    bottom: -70px;
    right: -90px;
    width: 500px;
    max-width: 40vw;
    height: auto;
    transform: rotate(166deg) scaleX(-1);
}

.capaian-decor-img {
    width: 100%;
    height: auto;
    display: block;
}

.capaian-container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 2;
}

/* ==========================================================================
   HEADER SECTION (MINIMALIST)
   ========================================================================== */
.capaian-header {
    text-align: center;
    max-width: 840px;
    margin: 0 auto 26px;
}

.capaian-badge {
    display: inline-block;
    background: rgba(9, 55, 125, 0.06);
    border: 1px solid rgba(9, 55, 125, 0.16);
    color: var(--color-primary, #09377D);
    padding: 5px 14px;
    border-radius: 9999px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 12px;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.capaian-title {
    font-size: 32px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    letter-spacing: -0.015em;
    margin-bottom: 10px;
    line-height: 1.25;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.capaian-subtitle {
    font-size: 15px;
    color: var(--color-text-muted, #475569);
    line-height: 1.6;
    margin: 0 auto;
    max-width: 740px;
}

/* ==========================================================================
   MENU FILTER PERIODE CMS: BULANAN & TAHUNAN (DINAMIS 100% SESUAI DATA)
   ========================================================================== */
.report-period-panel {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 14px);
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
    padding: 18px 22px;
    margin-bottom: 28px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.report-period-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    border-bottom: 1px solid #f1f5f9;
    padding-bottom: 12px;
}

/* Segmented Control untuk Tipe Laporan */
.report-type-toggle {
    display: inline-flex;
    background: #f1f5f9;
    padding: 4px;
    border-radius: 10px;
    gap: 4px;
}

.report-type-btn {
    border: none;
    background: transparent;
    color: #475569;
    padding: 7px 18px;
    border-radius: 7px;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    transition: all 0.2s ease;
    user-select: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.report-type-btn.active {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(9, 55, 125, 0.25);
}

.report-type-btn:hover:not(.active) {
    color: var(--color-primary, #09377D);
    background: rgba(9, 55, 125, 0.05);
}

.report-type-btn .count-tag {
    font-size: 11px;
    padding: 1px 6px;
    border-radius: 9999px;
    font-weight: 700;
    background: rgba(0, 0, 0, 0.08);
}

.report-type-btn.active .count-tag {
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
}

.report-cms-status {
    font-size: 12.5px;
    color: #64748b;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.status-dot-pulse {
    width: 8px;
    height: 8px;
    background: #10b981;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
}

/* Baris Selector Periode */
.report-selectors-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.selector-group {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.selector-label {
    font-size: 12px;
    font-weight: 700;
    color: var(--color-text-muted, #64748b);
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.pills-container {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    align-items: center;
}

.period-pill {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #334155;
    padding: 6px 14px;
    border-radius: 7px;
    font-size: 12.5px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.18s ease;
    user-select: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.period-pill:hover {
    border-color: #cbd5e1;
    color: var(--color-primary, #09377D);
    background: #ffffff;
}

.period-pill.active {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    border-color: var(--color-primary, #09377D);
    box-shadow: 0 2px 6px rgba(9, 55, 125, 0.2);
}

/* Active Context Banner Bar */
.report-active-bar {
    background: #f8fafc;
    border: 1px solid #edf2f7;
    border-radius: 8px;
    padding: 9px 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    font-size: 13px;
}

.active-bar-text {
    color: #334155;
}

.active-bar-text strong {
    color: var(--color-primary, #09377D);
}

.active-bar-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #64748b;
    font-size: 12px;
}

/* ==========================================================================
   KPI HIGHLIGHT CARDS (MURNI TIPOGRAFI, BEBAS ICON)
   ========================================================================== */
.kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 26px;
}

.kpi-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 12px;
    padding: 22px 20px;
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    display: flex;
    flex-direction: column;
    position: relative;
    border-top: 3px solid var(--color-primary, #09377D);
}

.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(9, 55, 125, 0.07);
    border-color: #cbd5e1;
}

.kpi-label {
    font-size: 12px;
    font-weight: 700;
    color: var(--color-text-muted, #64748b);
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-bottom: 8px;
}

.kpi-value {
    font-size: 26px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    line-height: 1.15;
    margin-bottom: 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    letter-spacing: -0.02em;
}

.kpi-desc {
    font-size: 12.5px;
    color: #64748b;
    line-height: 1.45;
    margin-top: auto;
}

/* ==========================================================================
   CONTENT BOX (BOX TITLES BEBAS DARI ICON)
   ========================================================================== */
.content-box {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
    padding: 26px 28px;
    margin-bottom: 26px;
}

.box-title-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--color-border, #e2e8f0);
}

.box-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0;
    line-height: 1.3;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.box-tag {
    font-size: 12px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
    background: #f8fafc;
    color: #475569;
    border: 1px solid #e2e8f0;
}

/* ==========================================================================
   TARGET VS REALISASI SASARAN STRATEGIS
   ========================================================================== */
.targets-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.target-item {
    background: #f8fafc;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 10px;
    padding: 16px 18px;
    transition: all 0.2s ease;
}

.target-item:hover {
    border-color: #cbd5e1;
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);
}

.target-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 14px;
    margin-bottom: 8px;
}

.target-title {
    font-size: 15px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin-bottom: 2px;
}

.target-indicator {
    font-size: 13px;
    color: var(--color-text-body, #334155);
    font-weight: 500;
}

.target-badge {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    display: inline-block;
    background: rgba(9, 55, 125, 0.06);
    color: var(--color-primary, #09377D);
    border: 1px solid rgba(9, 55, 125, 0.16);
}

.target-badge.badge-success {
    background: rgba(16, 185, 129, 0.08);
    color: #065f46;
    border-color: rgba(16, 185, 129, 0.25);
}

.target-badge.badge-running {
    background: rgba(9, 55, 125, 0.06);
    color: var(--color-primary, #09377D);
    border-color: rgba(9, 55, 125, 0.16);
}

.target-badge.badge-scheduled {
    background: #f1f5f9;
    color: #64748b;
    border-color: #e2e8f0;
}

.progress-wrap {
    margin: 8px 0 6px;
}

.progress-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12.5px;
    margin-bottom: 5px;
    font-weight: 600;
}

.progress-target-text {
    color: #64748b;
}

.progress-realisasi-text {
    color: var(--color-primary, #09377D);
}

.progress-bar-bg {
    width: 100%;
    height: 7px;
    background: #e2e8f0;
    border-radius: 9999px;
    overflow: hidden;
}

.progress-bar-fill {
    height: 100%;
    border-radius: 9999px;
    background: var(--color-primary, #09377D);
    transition: width 0.6s ease;
}

.target-keterangan {
    font-size: 12.5px;
    line-height: 1.45;
    color: #64748b;
    padding-top: 6px;
    border-top: 1px dashed #e2e8f0;
    margin-top: 6px;
}

/* ==========================================================================
   SEBARAN PESERTA WEBINAR
   ========================================================================== */
.analytics-panel {
    display: grid;
    grid-template-columns: 310px 1fr;
    gap: 32px;
    align-items: center;
}

.chart-doughnut-wrap {
    position: relative;
    width: 100%;
    height: 240px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chart-center-metric {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    pointer-events: none;
}

.center-num {
    font-size: 28px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    line-height: 1;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.center-lbl {
    font-size: 11px;
    color: #64748b;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-top: 3px;
}

.category-breakdown-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.category-row {
    background: #f8fafc;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 8px;
    padding: 10px 14px;
}

.cat-row-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 13px;
    margin-bottom: 6px;
}

.cat-label-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: var(--color-primary, #09377D);
}

.cat-dot {
    width: 9px;
    height: 9px;
    border-radius: 2px;
    flex-shrink: 0;
}

.cat-stat-nums {
    font-size: 12.5px;
    color: #475569;
}

.cat-stat-nums strong {
    color: var(--color-primary, #09377D);
}

.cat-progress-bg {
    width: 100%;
    height: 5px;
    background: #e2e8f0;
    border-radius: 9999px;
    overflow: hidden;
}

.cat-progress-bar {
    height: 100%;
    border-radius: 9999px;
}

/* ==========================================================================
   PERUSAHAAN TERLAYANI
   ========================================================================== */
.companies-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.company-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
}

.company-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(9, 55, 125, 0.06);
    border-color: #cbd5e1;
}

.company-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
}

.company-logo-frame {
    width: 48px;
    height: 48px;
    background: #f8fafc;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    flex-shrink: 0;
    overflow: hidden;
}

.company-logo-img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.75);
    transition: filter 0.2s ease, transform 0.2s ease;
}

.company-card:hover .company-logo-img {
    filter: grayscale(0%) opacity(1);
    transform: scale(1.04);
}

.company-avatar-fallback {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 800;
    color: #64748b;
    background: #f1f5f9;
    border-radius: 6px;
}

.company-title-info {
    flex: 1;
    min-width: 0;
}

.company-name {
    font-size: 15px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin-bottom: 2px;
    line-height: 1.3;
}

.company-bidang {
    font-size: 12.5px;
    color: #64748b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.company-badges {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
    margin-bottom: 10px;
}

.comp-badge-service {
    background: #f1f5f9;
    color: var(--color-primary, #09377D);
    border: 1px solid #e2e8f0;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 11.5px;
    font-weight: 600;
}

.comp-badge-status {
    background: rgba(9, 55, 125, 0.06);
    color: var(--color-primary, #09377D);
    border: 1px solid rgba(9, 55, 125, 0.15);
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 11.5px;
    font-weight: 600;
}

.company-details-table {
    margin-top: auto;
    font-size: 12.5px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    background: #f8fafc;
    padding: 8px 10px;
    border-radius: 6px;
    border: 1px solid #edf2f7;
}

.comp-detail-row {
    display: flex;
    align-items: center;
    gap: 8px;
}

.comp-detail-row .label {
    width: 65px;
    flex-shrink: 0;
    color: #64748b;
    font-weight: 500;
}

.comp-detail-row .val {
    color: #334155;
    font-weight: 600;
    flex: 1;
}

/* ==========================================================================
   EMPTY STATE (KETIKA PERIODE BELUM ADA DATA DARI CMS)
   ========================================================================== */
.empty-report-card {
    background: #ffffff;
    border: 1px dashed var(--color-border, #cbd5e1);
    border-radius: 14px;
    padding: 48px 24px;
    text-align: center;
    margin-bottom: 30px;
}

.empty-report-card h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0 0 8px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.empty-report-card p {
    font-size: 14px;
    color: #64748b;
    max-width: 540px;
    margin: 0 auto;
    line-height: 1.6;
}

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */
@media (max-width: 992px) {
    .analytics-panel {
        grid-template-columns: 1fr;
    }
    .kpi-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .companies-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .capaian-title {
        font-size: 24px;
    }
    .kpi-grid {
        grid-template-columns: 1fr;
    }
    .content-box {
        padding: 20px 16px;
    }
    .report-period-panel {
        padding: 16px 14px;
    }
    .target-header {
        flex-direction: column;
    }
    .report-type-toggle {
        width: 100%;
    }
    .report-type-btn {
        flex: 1;
        text-align: center;
        padding: 8px 10px;
        font-size: 13px;
    }
}
</style>

<div class="capaian-page-wrap">

    <!-- Dekorasi Garis Abstrak K3 (Kiri Atas & Kanan Bawah) -->
    <div class="capaian-decor decor-top-left" aria-hidden="true">
        <img src="{{ asset('assets/decor_loop_navy.png') }}" alt="" class="capaian-decor-img">
    </div>
    <div class="capaian-decor decor-bottom-right" aria-hidden="true">
        <img src="{{ asset('assets/decor_loop_navy.png') }}" alt="" class="capaian-decor-img">
    </div>

    <div class="capaian-container">

        <!-- HEADER SECTION -->
        <header class="capaian-header">
            <h1 class="capaian-title" id="capaianTitleText">{{ $meta['title'] ?? 'Sasaran Strategis & Capaian Kinerja Balai K3 Medan' }}</h1>
            <p class="capaian-subtitle" id="capaianDescText">
                {{ $summary['deskripsi'] ?? 'Pelaksanaan kegiatan keselamatan dan kesehatan kerja serta realisasi pengujian lingkungan kerja Balai K3 Medan.' }}
            </p>
        </header>

        <!-- ==================================================================
             MENU FILTER PERIODE CMS: MONTHLY REPORT & YEARLY REPORT
             (OTOMATIS BERIKUT DATA YANG ADA / DIPUSH DARI CMS)
             ================================================================== -->
        <section class="report-period-panel" aria-label="Menu Periode Laporan Kinerja">
            
            <!-- Baris Atas: Toggle Tipe Laporan (Bulanan vs Tahunan) -->
            <div class="report-period-top">
                <div class="report-type-toggle" role="tablist">
                    <button type="button" 
                            class="report-type-btn {{ $currentTipe === 'bulanan' ? 'active' : '' }}" 
                            data-type="bulanan" 
                            id="btnTypeBulanan"
                            role="tab"
                            aria-selected="{{ $currentTipe === 'bulanan' ? 'true' : 'false' }}">
                        <span>Laporan Bulanan</span>
                        @if ($options['monthly_count'] ?? 0)
                            <span class="count-tag">{{ $options['monthly_count'] }}</span>
                        @endif
                    </button>
                    <button type="button" 
                            class="report-type-btn {{ $currentTipe === 'tahunan' ? 'active' : '' }}" 
                            data-type="tahunan" 
                            id="btnTypeTahunan"
                            role="tab"
                            aria-selected="{{ $currentTipe === 'tahunan' ? 'true' : 'false' }}">
                        <span>Laporan Tahunan</span>
                        @if ($options['yearly_count'] ?? 0)
                            <span class="count-tag">{{ $options['yearly_count'] }}</span>
                        @endif
                    </button>
                </div>

                <div class="report-cms-status">
                    <span class="status-dot-pulse"></span>
                    <span>Format Laporan Terintegrasi CMS</span>
                </div>
            </div>

            <!-- Baris Selector: Tahun & Bulan (Opsi Dinamis Berdasarkan Data Riil) -->
            <div class="report-selectors-row" id="reportSelectorsRow">
                
                <!-- Selector Tahun (Muncul jika ada tahun yang tersedia) -->
                <div class="selector-group" id="yearSelectorGroup">
                    <span class="selector-label">Tahun:</span>
                    <div class="pills-container" id="yearPillsWrap">
                        @php
                            $activeYearsList = ($currentTipe === 'tahunan') ? $yearlyYears : $monthlyYears;
                        @endphp
                        @if (!empty($activeYearsList))
                            @foreach ($activeYearsList as $thn)
                                <button type="button" 
                                        class="period-pill {{ $currentTahun === (int)$thn ? 'active' : '' }}" 
                                        data-year="{{ $thn }}">
                                    {{ $thn }}
                                </button>
                            @endforeach
                        @else
                            <span style="font-size: 12.5px; color: #94a3b8; font-style: italic;">Belum ada data tahun</span>
                        @endif
                    </div>
                </div>

                <!-- Selector Bulan (Hanya muncul pada mode Laporan Bulanan dan hanya untuk bulan yang ada datanya) -->
                <div class="selector-group" id="monthSelectorGroup" style="{{ $currentTipe === 'tahunan' ? 'display: none;' : '' }}">
                    <span class="selector-label">Bulan:</span>
                    <div class="pills-container" id="monthPillsWrap">
                        @if (!empty($availableMonthsForCurrentYear))
                            @foreach ($availableMonthsForCurrentYear as $bId => $bData)
                                <button type="button" 
                                        class="period-pill {{ $currentBulan === (string)$bId ? 'active' : '' }}" 
                                        data-month="{{ $bId }}">
                                    {{ $bData['nama'] }}
                                </button>
                            @endforeach
                        @else
                            <span style="font-size: 12.5px; color: #94a3b8; font-style: italic;">Belum ada data bulan</span>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Active Context Banner Bar -->
            <div class="report-active-bar">
                <div class="active-bar-text">
                    Menampilkan: <strong id="activePeriodLabel">{{ $periodeLabel }}</strong> &mdash; 
                    <span id="activeBadgeLabel" style="color: #64748b;">{{ $badgePeriode }}</span>
                </div>
                <div class="active-bar-meta">
                    <span>Regulasi: <strong>{{ $meta['regulasi'] ?? 'Permenaker No. 1/2022' }}</strong></span>
                    <span>&bull;</span>
                    <span>Status: <strong>Data Terverifikasi</strong></span>
                </div>
            </div>

        </section>

        <!-- KONTENER KONTEN LAPORAN (ATAU EMPTY STATE JIKA BELUM ADA DATA) -->
        <div id="reportContentWrap">
            @if ($activeReport)
                <!-- ==================================================================
                     KPI HIGHLIGHT CARDS (MURNI TIPOGRAFI, BEBAS ICON)
                     ================================================================== -->
                <section class="kpi-grid" id="kpiGridContainer" aria-label="Ringkasan Indikator Kinerja Utama">
                    @foreach ($kpiList as $item)
                        <div class="kpi-card" data-kpi-id="{{ $item['id'] ?? '' }}">
                            <div class="kpi-label">{{ $item['label'] ?? '' }}</div>
                            <div class="kpi-value">{{ $item['format'] ?? number_format($item['nilai'] ?? 0) }}</div>
                            <div class="kpi-desc">{{ $item['keterangan'] ?? '' }}</div>
                        </div>
                    @endforeach
                </section>

                <!-- ==================================================================
                     SECTION 1: SASARAN STRATEGIS & TARGET VS REALISASI
                     ================================================================== -->
                <section class="content-box">
                    <div class="box-title-wrap">
                        <h2 class="box-title">
                            Sasaran Strategis &amp; Target vs Realisasi
                        </h2>
                        <span class="box-tag" id="sasaranBoxTag">Perjanjian Kinerja Resmi {{ $currentTahun }}</span>
                    </div>

                    <div class="targets-list" id="targetsListContainer">
                        @foreach ($sasaranList as $sas)
                            @php
                                $targetVal = $sas['target'] ?? 0;
                                $realVal = $sas['realisasi'] ?? 0;
                                $persen = $sas['persen'] ?? 0;
                                $barWidth = min(100, max(0, $persen));
                                $badgeClass = ($persen >= 100) ? 'badge-success' : (($persen > 0) ? 'badge-running' : 'badge-scheduled');
                                $badgeText = ($persen >= 100) ? number_format($persen, 1) . '% (Tercapai)' : (($persen > 0) ? number_format($persen, 2) . '% (Berjalan)' : 'Terjadwal TW-II');
                            @endphp
                            <article class="target-item">
                                <div class="target-header">
                                    <div>
                                        <div class="target-title">{{ $sas['sasaran'] ?? '' }}</div>
                                        <div class="target-indicator">
                                            <strong>Indikator:</strong> {{ $sas['indikator'] ?? '' }}
                                        </div>
                                    </div>
                                    <span class="target-badge {{ $badgeClass }}">{{ $badgeText }}</span>
                                </div>

                                <div class="progress-wrap">
                                    <div class="progress-meta">
                                        <span class="progress-target-text">
                                            Target: <strong>{{ number_format($targetVal) }} {{ $sas['satuan'] ?? '' }}</strong>
                                        </span>
                                        <span class="progress-realisasi-text">
                                            Realisasi: <strong>{{ number_format($realVal) }} {{ $sas['satuan'] ?? '' }}</strong>
                                        </span>
                                    </div>
                                    <div class="progress-bar-bg">
                                        <div class="progress-bar-fill" style="width: {{ $barWidth }}%;"></div>
                                    </div>
                                </div>

                                <div class="target-keterangan">
                                    {{ $sas['keterangan'] ?? '' }}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <!-- ==================================================================
                     SECTION 2: SEBARAN PESERTA EDUKASI & WEBINAR
                     ================================================================== -->
                <section class="content-box">
                    <div class="box-title-wrap">
                        <h2 class="box-title" id="sebaranTitle">
                            {{ $sebaran['judul'] ?? 'Rincian Peserta Webinar Nasional (Toolbox Meeting)' }}
                        </h2>
                        <span class="box-tag" id="sebaranTotalTag">Total: {{ number_format($sebaran['total'] ?? 0) }} Peserta</span>
                    </div>

                    <div class="analytics-panel">
                        <!-- Kolom Kiri: Doughnut Chart dengan Metric Angka di Tengah -->
                        <div class="chart-doughnut-wrap">
                            <canvas id="chartSebaranPeserta"></canvas>
                            <div class="chart-center-metric">
                                <div class="center-num" id="chartCenterNum">{{ number_format($sebaran['total'] ?? 0) }}</div>
                                <div class="center-lbl">Peserta</div>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Rincian Lengkap Kategori dengan Bar Proporsional -->
                        <div class="category-breakdown-list" id="categoryBreakdownContainer">
                            @if (!empty($sebaran['kategori']))
                                @foreach ($sebaran['kategori'] as $kat)
                                    @php
                                        $barW = min(100, max(0, $kat['persen'] ?? 0));
                                        $color = $kat['warna'] ?? '#09377D';
                                    @endphp
                                    <div class="category-row">
                                        <div class="cat-row-top">
                                            <div class="cat-label-wrap">
                                                <span class="cat-dot" style="background: {{ $color }};"></span>
                                                <span>{{ $kat['label'] ?? '' }}</span>
                                            </div>
                                            <div class="cat-stat-nums">
                                                <strong>{{ number_format($kat['jumlah'] ?? 0) }}</strong> Orang 
                                                ({{ number_format($kat['persen'] ?? 0, 1) }}%)
                                            </div>
                                        </div>
                                        <div class="cat-progress-bg">
                                            <div class="cat-progress-bar" style="width: {{ $barW }}%; background: {{ $color }};"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </section>

                <!-- ==================================================================
                     SECTION 3: PERUSAHAAN MITRA TERLAYANI
                     ================================================================== -->
                <section class="content-box">
                    <div class="box-title-wrap">
                        <h2 class="box-title">
                            Perusahaan yang Telah Memperoleh Layanan Pengujian K3
                        </h2>
                        <span class="box-tag" id="companiesTotalTag">Total: {{ count($companies) }} Perusahaan</span>
                    </div>

                    <div class="companies-grid" id="companiesGridContainer">
                        @foreach ($companies as $comp)
                            @php
                                $logoUrl = $comp['resolved_logo'] ?? '';
                                $domain = $comp['domain'] ?? '';
                                $initials = $comp['initials'] ?? 'K3';
                            @endphp
                            <article class="company-card">
                                <div class="company-header">
                                    <div class="company-logo-frame" title="{{ $comp['nama'] ?? '' }}">
                                        @if (!empty($logoUrl))
                                            <img src="{{ $logoUrl }}" 
                                                 alt="Logo {{ $comp['singkatan'] ?? $comp['nama'] }}" 
                                                 class="company-logo-img"
                                                 data-domain="{{ $domain }}"
                                                 data-initials="{{ $initials }}"
                                                 onerror="handleCompanyLogoError(this)">
                                        @else
                                            <div class="company-avatar-fallback">{{ $initials }}</div>
                                        @endif
                                    </div>

                                    <div class="company-title-info">
                                        <h3 class="company-name">{{ $comp['nama'] ?? '' }}</h3>
                                        <div class="company-bidang">{{ $comp['bidang'] ?? '' }}</div>
                                    </div>
                                </div>

                                <div class="company-badges">
                                    <span class="comp-badge-service">{{ $comp['layanan'] ?? 'Pengujian K3' }}</span>
                                    <span class="comp-badge-status">{{ $comp['status'] ?? 'Selesai Terverifikasi' }}</span>
                                </div>

                                <div class="company-details-table">
                                    <div class="comp-detail-row">
                                        <span class="label">Lokasi:</span>
                                        <span class="val">{{ $comp['lokasi'] ?? 'Sumatera Utara' }}</span>
                                    </div>
                                    <div class="comp-detail-row">
                                        <span class="label">Periode:</span>
                                        <span class="val">{{ $comp['periode'] ?? $periodeLabel }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @else
                <!-- EMPTY STATE: JIKA BELUM ADA DATA YANG DIPUSH DARI CMS -->
                <div class="empty-report-card" id="emptyReportState">
                    <h3>Data Laporan Belum Dipublikasikan</h3>
                    <p>
                        Belum ada data capaian kinerja yang diunggah dari CMS untuk periode yang dipilih.
                        Data akan otomatis tampil di halaman ini begitu admin mempublikasikan laporan melalui CMS.
                    </p>
                </div>
            @endif
        </div>

    </div>
</div>

<!-- ==========================================================================
     SCRIPT SINKRONISASI DATA DINAMIS & RESPONSIF DARI CMS
     ========================================================================== -->
<script>
window.CAPAIAN_BUNDLE = <?= json_encode($bundle, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

/**
 * Fallback Bertingkat Logo Perusahaan dari Internet
 */
function handleCompanyLogoError(img) {
    const domain = img.getAttribute('data-domain');
    const initials = img.getAttribute('data-initials') || 'K3';
    const retryCount = parseInt(img.getAttribute('data-retry') || '0', 10);

    if (domain && retryCount === 0) {
        img.setAttribute('data-retry', '1');
        img.src = 'https://www.google.com/s2/favicons?domain=' + encodeURIComponent(domain) + '&sz=128';
    } else if (domain && retryCount === 1) {
        img.setAttribute('data-retry', '2');
        img.src = 'https://unavatar.io/' + encodeURIComponent(domain);
    } else {
        const frame = img.parentElement;
        if (frame) {
            frame.innerHTML = '<div class="company-avatar-fallback">' + initials + '</div>';
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    let currentTipe = '<?= $currentTipe ?>';
    let currentTahun = <?= $currentTahun ?>;
    let currentBulan = '<?= $currentBulan ?>';

    const btnTypeBulanan = document.getElementById('btnTypeBulanan');
    const btnTypeTahunan = document.getElementById('btnTypeTahunan');
    const monthSelectorGroup = document.getElementById('monthSelectorGroup');
    const yearPillsWrap = document.getElementById('yearPillsWrap');
    const monthPillsWrap = document.getElementById('monthPillsWrap');
    const reportContentWrap = document.getElementById('reportContentWrap');

    let doughnutChartInstance = null;

    const bundle = window.CAPAIAN_BUNDLE || {};
    const options = bundle.options || {};
    const bulananMap = bundle.bulanan || {};
    const tahunanMap = bundle.tahunan || {};

    // Render pills tahun sesuai tipe aktif
    function updateYearPills() {
        if (!yearPillsWrap) return;
        const years = (currentTipe === 'tahunan') ? (options.yearly_years || []) : (options.monthly_years || []);
        
        if (years.length === 0) {
            yearPillsWrap.innerHTML = '<span style="font-size: 12.5px; color: #94a3b8; font-style: italic;">Belum ada data tahun</span>';
            return;
        }

        let html = '';
        years.forEach(thn => {
            const activeCls = (currentTahun === parseInt(thn, 10)) ? 'active' : '';
            html += `<button type="button" class="period-pill ${activeCls}" data-year="${thn}">${thn}</button>`;
        });
        yearPillsWrap.innerHTML = html;
    }

    // Render pills bulan sesuai tahun yang dipilih
    function updateMonthPills() {
        if (!monthPillsWrap) return;
        if (currentTipe === 'tahunan') {
            if (monthSelectorGroup) monthSelectorGroup.style.display = 'none';
            return;
        }

        if (monthSelectorGroup) monthSelectorGroup.style.display = 'flex';
        const monthsForYear = (options.monthly_map && options.monthly_map[currentTahun]) ? options.monthly_map[currentTahun] : {};
        const monthKeys = Object.keys(monthsForYear);

        if (monthKeys.length === 0) {
            monthPillsWrap.innerHTML = '<span style="font-size: 12.5px; color: #94a3b8; font-style: italic;">Belum ada data bulan</span>';
            return;
        }

        let html = '';
        monthKeys.forEach(bId => {
            const bData = monthsForYear[bId];
            const activeCls = (currentBulan === String(bId)) ? 'active' : '';
            html += `<button type="button" class="period-pill ${activeCls}" data-month="${bId}">${bData.nama || bId}</button>`;
        });
        monthPillsWrap.innerHTML = html;
    }

    // Mengambil dataset aktif
    function getActiveDataset(tipe, tahun, bulan) {
        if (tipe === 'tahunan') {
            return tahunanMap[String(tahun)] || null;
        } else {
            const key = tahun + '-' + String(bulan).padStart(2, '0');
            return bulananMap[key] || null;
        }
    }

    // Update Chart.js
    function initOrUpdateChart(sebaranData, totalPeserta) {
        if (typeof Chart === 'undefined') return;

        Chart.defaults.font.family = "'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";
        Chart.defaults.color = '#64748b';

        const doughnutCanvas = document.getElementById('chartSebaranPeserta');
        if (!doughnutCanvas) return;

        const categories = (sebaranData && sebaranData.kategori) ? sebaranData.kategori : [];
        const labels = categories.map(item => item.label);
        const dataValues = categories.map(item => item.jumlah);
        const bgColors = categories.map(item => item.warna || '#09377D');

        const centerNumEl = document.getElementById('chartCenterNum');
        if (centerNumEl) {
            centerNumEl.textContent = (totalPeserta || 0).toLocaleString('id-ID');
        }

        if (doughnutChartInstance) {
            doughnutChartInstance.data.labels = labels;
            doughnutChartInstance.data.datasets[0].data = dataValues;
            doughnutChartInstance.data.datasets[0].backgroundColor = bgColors;
            doughnutChartInstance.update();
            return;
        }

        doughnutChartInstance = new Chart(doughnutCanvas, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: bgColors,
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#09377D',
                        titleFont: { size: 12.5, weight: 'bold' },
                        bodyFont: { size: 12 },
                        padding: 10,
                        cornerRadius: 6,
                        callbacks: {
                            label: function(context) {
                                const val = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = total ? ((val / total) * 100).toFixed(1) : 0;
                                return ' ' + context.label + ': ' + val.toLocaleString('id-ID') + ' orang (' + percentage + '%)';
                            }
                        }
                    }
                },
                cutout: '72%'
            }
        });
    }

    // Render ulang tampilan utama saat opsi diubah
    function renderReportView(tipe, tahun, bulan) {
        updateYearPills();
        updateMonthPills();

        const dataset = getActiveDataset(tipe, tahun, bulan);

        const activePeriodLabel = document.getElementById('activePeriodLabel');
        const activeBadgeLabel = document.getElementById('activeBadgeLabel');
        const capaianDescText = document.getElementById('capaianDescText');

        if (dataset) {
            if (activePeriodLabel) activePeriodLabel.textContent = dataset.periode_label || '';
            if (activeBadgeLabel) activeBadgeLabel.textContent = dataset.badge_periode || (tipe === 'tahunan' ? 'Laporan Tahunan' : 'Laporan Bulanan');
            if (capaianDescText && dataset.ringkasan_eksekutif) {
                capaianDescText.textContent = dataset.ringkasan_eksekutif.deskripsi || '';
            }

            // Bangun tampilan data lengkap
            let html = `
                <!-- KPI GRID -->
                <section class="kpi-grid" id="kpiGridContainer" aria-label="Ringkasan Indikator Kinerja Utama">
            `;
            (dataset.kpi_utama || []).forEach(item => {
                html += `
                    <div class="kpi-card" data-kpi-id="${item.id || ''}">
                        <div class="kpi-label">${item.label || ''}</div>
                        <div class="kpi-value">${item.format || (item.nilai || 0).toLocaleString('id-ID')}</div>
                        <div class="kpi-desc">${item.keterangan || ''}</div>
                    </div>
                `;
            });
            html += `</section>`;

            // SASARAN STRATEGIS
            html += `
                <section class="content-box">
                    <div class="box-title-wrap">
                        <h2 class="box-title">Sasaran Strategis &amp; Target vs Realisasi</h2>
                        <span class="box-tag">Perjanjian Kinerja Resmi ${tahun}</span>
                    </div>
                    <div class="targets-list">
            `;
            (dataset.sasaran_strategis || []).forEach(sas => {
                const targetVal = sas.target || 0;
                const realVal = sas.realisasi || 0;
                const persen = sas.persen || 0;
                const barWidth = Math.min(100, Math.max(0, persen));
                const badgeClass = (persen >= 100) ? 'badge-success' : ((persen > 0) ? 'badge-running' : 'badge-scheduled');
                const badgeText = (persen >= 100) ? persen.toFixed(1) + '% (Tercapai)' : ((persen > 0) ? persen.toFixed(2) + '% (Berjalan)' : 'Terjadwal TW-II');

                html += `
                    <article class="target-item">
                        <div class="target-header">
                            <div>
                                <div class="target-title">${sas.sasaran || ''}</div>
                                <div class="target-indicator"><strong>Indikator:</strong> ${sas.indikator || ''}</div>
                            </div>
                            <span class="target-badge ${badgeClass}">${badgeText}</span>
                        </div>
                        <div class="progress-wrap">
                            <div class="progress-meta">
                                <span class="progress-target-text">Target: <strong>${targetVal.toLocaleString('id-ID')} ${sas.satuan || ''}</strong></span>
                                <span class="progress-realisasi-text">Realisasi: <strong>${realVal.toLocaleString('id-ID')} ${sas.satuan || ''}</strong></span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" style="width: ${barWidth}%;"></div>
                            </div>
                        </div>
                        <div class="target-keterangan">${sas.keterangan || ''}</div>
                    </article>
                `;
            });
            html += `</div></section>`;

            // SEBARAN PESERTA WEBINAR
            const seb = dataset.sebaran_peserta_webinar || {};
            html += `
                <section class="content-box">
                    <div class="box-title-wrap">
                        <h2 class="box-title">${seb.judul || 'Rincian Peserta Edukasi K3'}</h2>
                        <span class="box-tag">Total: ${(seb.total || 0).toLocaleString('id-ID')} Peserta</span>
                    </div>
                    <div class="analytics-panel">
                        <div class="chart-doughnut-wrap">
                            <canvas id="chartSebaranPeserta"></canvas>
                            <div class="chart-center-metric">
                                <div class="center-num" id="chartCenterNum">${(seb.total || 0).toLocaleString('id-ID')}</div>
                                <div class="center-lbl">Peserta</div>
                            </div>
                        </div>
                        <div class="category-breakdown-list">
            `;
            (seb.kategori || []).forEach(kat => {
                const barW = Math.min(100, Math.max(0, kat.persen || 0));
                const col = kat.warna || '#09377D';
                html += `
                    <div class="category-row">
                        <div class="cat-row-top">
                            <div class="cat-label-wrap">
                                <span class="cat-dot" style="background: ${col};"></span>
                                <span>${kat.label || ''}</span>
                            </div>
                            <div class="cat-stat-nums">
                                <strong>${(kat.jumlah || 0).toLocaleString('id-ID')}</strong> Orang (${(kat.persen || 0).toFixed(1)}%)
                            </div>
                        </div>
                        <div class="cat-progress-bg">
                            <div class="cat-progress-bar" style="width: ${barW}%; background: ${col};"></div>
                        </div>
                    </div>
                `;
            });
            html += `</div></div></section>`;

            // PERUSAHAAN MITRA
            const compList = dataset.perusahaan_mitra || [];
            html += `
                <section class="content-box">
                    <div class="box-title-wrap">
                        <h2 class="box-title">Perusahaan yang Telah Memperoleh Layanan Pengujian K3</h2>
                        <span class="box-tag">Total: ${compList.length} Perusahaan</span>
                    </div>
                    <div class="companies-grid">
            `;
            compList.forEach(comp => {
                const logo = comp.resolved_logo || '';
                const domain = comp.domain || '';
                const initials = comp.initials || 'K3';
                html += `
                    <article class="company-card">
                        <div class="company-header">
                            <div class="company-logo-frame" title="${comp.nama || ''}">
                                ${logo ? `
                                    <img src="${logo}" 
                                         alt="Logo ${comp.singkatan || comp.nama || ''}" 
                                         class="company-logo-img"
                                         data-domain="${domain}"
                                         data-initials="${initials}"
                                         onerror="handleCompanyLogoError(this)">
                                ` : `
                                    <div class="company-avatar-fallback">${initials}</div>
                                `}
                            </div>
                            <div class="company-title-info">
                                <h3 class="company-name">${comp.nama || ''}</h3>
                                <div class="company-bidang">${comp.bidang || ''}</div>
                            </div>
                        </div>
                        <div class="company-badges">
                            <span class="comp-badge-service">${comp.layanan || 'Pengujian K3'}</span>
                            <span class="comp-badge-status">${comp.status || 'Selesai Terverifikasi'}</span>
                        </div>
                        <div class="company-details-table">
                            <div class="comp-detail-row">
                                <span class="label">Lokasi:</span>
                                <span class="val">${comp.lokasi || 'Sumatera Utara'}</span>
                            </div>
                            <div class="comp-detail-row">
                                <span class="label">Periode:</span>
                                <span class="val">${comp.periode || dataset.periode_label || ''}</span>
                            </div>
                        </div>
                    </article>
                `;
            });
            html += `</div></section>`;

            if (reportContentWrap) reportContentWrap.innerHTML = html;
            doughnutChartInstance = null;
            initOrUpdateChart(seb, seb.total || 0);

        } else {
            // Render Clean Empty State
            if (activePeriodLabel) activePeriodLabel.textContent = (tipe === 'tahunan' ? 'Tahun ' + tahun : 'Periode Terpilih');
            if (activeBadgeLabel) activeBadgeLabel.textContent = (tipe === 'tahunan' ? 'Laporan Tahunan' : 'Laporan Bulanan');
            
            if (reportContentWrap) {
                reportContentWrap.innerHTML = `
                    <div class="empty-report-card" id="emptyReportState">
                        <h3>Data Laporan Belum Dipublikasikan</h3>
                        <p>
                            Belum ada data capaian kinerja yang dipush dari CMS untuk ${tipe === 'tahunan' ? 'Tahun ' + tahun : 'Bulan ' + bulan + '/' + tahun}.
                            Data akan otomatis terhubung dan tampil di sini begitu dipublikasikan melalui CMS.
                        </p>
                    </div>
                `;
            }
        }

        // Update URL secara transparan
        const url = new URL(window.location);
        url.searchParams.set('tipe', tipe);
        url.searchParams.set('tahun', tahun);
        if (tipe === 'bulanan') {
            url.searchParams.set('bulan', bulan);
        } else {
            url.searchParams.delete('bulan');
        }
        window.history.replaceState({}, '', url);
    }

    // Toggle Tipe Laporan
    if (btnTypeBulanan && btnTypeTahunan) {
        btnTypeBulanan.addEventListener('click', function() {
            if (currentTipe === 'bulanan') return;
            currentTipe = 'bulanan';
            btnTypeBulanan.classList.add('active');
            btnTypeTahunan.classList.remove('active');
            
            const firstMYear = (options.monthly_years && options.monthly_years[0]) ? options.monthly_years[0] : currentTahun;
            currentTahun = firstMYear;
            const monthsForYear = (options.monthly_map && options.monthly_map[currentTahun]) ? Object.keys(options.monthly_map[currentTahun]) : [];
            currentBulan = monthsForYear[0] || '01';

            renderReportView(currentTipe, currentTahun, currentBulan);
        });

        btnTypeTahunan.addEventListener('click', function() {
            if (currentTipe === 'tahunan') return;
            currentTipe = 'tahunan';
            btnTypeTahunan.classList.add('active');
            btnTypeBulanan.classList.remove('active');
            
            const firstYYear = (options.yearly_years && options.yearly_years[0]) ? options.yearly_years[0] : currentTahun;
            currentTahun = firstYYear;

            renderReportView(currentTipe, currentTahun, currentBulan);
        });
    }

    // Event Handler Pemilihan Tahun
    if (yearPillsWrap) {
        yearPillsWrap.addEventListener('click', function(e) {
            const btn = e.target.closest('.period-pill');
            if (!btn) return;
            currentTahun = parseInt(btn.getAttribute('data-year') || '2026', 10);
            
            if (currentTipe === 'bulanan') {
                const monthsForYear = (options.monthly_map && options.monthly_map[currentTahun]) ? Object.keys(options.monthly_map[currentTahun]) : [];
                if (!monthsForYear.includes(currentBulan)) {
                    currentBulan = monthsForYear[0] || '01';
                }
            }

            renderReportView(currentTipe, currentTahun, currentBulan);
        });
    }

    // Event Handler Pemilihan Bulan
    if (monthPillsWrap) {
        monthPillsWrap.addEventListener('click', function(e) {
            const btn = e.target.closest('.period-pill');
            if (!btn) return;
            currentBulan = btn.getAttribute('data-month') || '01';
            renderReportView(currentTipe, currentTahun, currentBulan);
        });
    }

    // Initial Chart render
    const initialDataset = getActiveDataset(currentTipe, currentTahun, currentBulan);
    if (initialDataset && initialDataset.sebaran_peserta_webinar) {
        initOrUpdateChart(initialDataset.sebaran_peserta_webinar, initialDataset.sebaran_peserta_webinar.total || 0);
    }
});
</script>

@endsection
