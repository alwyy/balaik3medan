@extends('layouts.app')

@section('content')
﻿<?php
/**
 * Capaian Kinerja & Sasaran Strategis - Balai K3 Medan
 * Desain Resmi Pemerintahan (Clean, Authoritative & Monochromatic Navy)
 * Tanpa kesimpulan objek buatan, warna tidak variatif/berlebihan, dan tanpa ruang kosong.
 */

$meta = $kinerja['meta'] ?? [
    'tahun' => 2026,
    'periode_laporan' => 'Januari 2026'
];
$summary = $summary ?? [];
$kpiList = $kpi ?? [];
$sasaranList = $sasaran ?? [];
$sebaran = $sebaran ?? [];
$companies = $companies ?? [];

// Helper inline SVG icons & badge Rupiah untuk KPI agar pasti muncul dan konsisten
$kpiSvgIcons = [
    'pnbp' => '<span style="font-size: 14px; font-weight: 800; font-family: var(--font-title, \'Montserrat\', sans-serif); letter-spacing: -0.02em; line-height: 1;">Rp</span>',
    'perusahaan' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>',
    'peserta' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'sosialisasi' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="14" x="3" y="3" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/><path d="m9 8 2 2 4-4"/></svg>'
];
?>

<style>
/* ==========================================================================
   HALAMAN CAPAIAN KINERJA (TEMA RESMI PEMERINTAHAN - MONOKROMATIK NAVY)
   ========================================================================== */
.capaian-page-wrap {
    background: var(--color-bg, #f8fafc);
    color: var(--color-text-body, #334155);
    min-height: calc(100vh - 180px);
    padding: 24px 0 70px;
    position: relative;
    overflow: hidden;
}

/* Dekorasi Garis Abstrak K3 (Kiri Atas & Kanan Bawah) */
.capaian-decor {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    user-select: none;
    opacity: 0.12;
    transition: opacity 0.3s ease;
}

.capaian-decor.decor-top-left {
    top: -40px;
    left: -70px;
    width: 440px;
    max-width: 36vw;
    height: auto;
    transform: rotate(-14deg);
}

.capaian-decor.decor-bottom-right {
    bottom: -60px;
    right: -80px;
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

/* HEADER SECTION */
.capaian-header {
    text-align: center;
    max-width: 820px;
    margin: 0 auto 30px;
}

.capaian-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: rgba(9, 55, 125, 0.06);
    border: 1px solid rgba(9, 55, 125, 0.16);
    color: var(--color-primary, #09377D);
    padding: 5px 14px;
    border-radius: 9999px;
    font-size: 12.5px;
    font-weight: 700;
    margin-bottom: 12px;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.capaian-title {
    font-size: 30px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    letter-spacing: -0.01em;
    margin-bottom: 10px;
    line-height: 1.25;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.capaian-subtitle {
    font-size: 15px;
    color: var(--color-text-muted, #475569);
    line-height: 1.6;
    margin: 0 auto 16px;
    max-width: 720px;
}

.capaian-meta-bar {
    display: inline-flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
    background: #ffffff;
    padding: 7px 18px;
    border-radius: 9999px;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,0.03));
    font-size: 13px;
    color: var(--color-primary, #09377D);
    font-weight: 600;
}

.capaian-meta-bar span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.capaian-meta-bar .divider {
    color: #cbd5e1;
}

/* ==========================================================================
   KPI HIGHLIGHT CARDS (UNIFIED TONE - NO RAINBOW VARIATION)
   ========================================================================== */
.kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 30px;
}

.kpi-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-lg, 14px);
    padding: 20px 18px;
    box-shadow: var(--shadow-sm, 0 2px 8px rgba(15, 23, 42, 0.03));
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
    position: relative;
    border-top: 3px solid var(--color-primary, #09377D);
}

.kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(9, 55, 125, 0.08);
}

.kpi-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

.kpi-icon-wrap {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(9, 55, 125, 0.06);
    color: var(--color-primary, #09377D);
}

.kpi-label {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--color-text-muted, #64748b);
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.kpi-value {
    font-size: 24px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    line-height: 1.15;
    margin-bottom: 5px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    letter-spacing: -0.02em;
}

.kpi-desc {
    font-size: 12.5px;
    color: var(--color-text-muted, #64748b);
    line-height: 1.4;
    margin-top: auto;
}

/* ==========================================================================
   CONTENT CARD WRAPPER
   ========================================================================== */
.content-box {
    background: #ffffff;
    border-radius: var(--radius-xl, 16px);
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-sm, 0 2px 8px rgba(15, 23, 42, 0.03));
    padding: 26px 28px;
    margin-bottom: 28px;
}

.box-title-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--color-border, #e2e8f0);
}

.box-title {
    font-size: 18.5px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.box-title svg {
    color: var(--color-primary, #09377D);
}

.box-tag {
    font-size: 12px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
    background: #f8fafc;
    color: var(--color-text-muted, #475569);
    border: 1px solid #e2e8f0;
}

/* ==========================================================================
   TARGET VS REALISASI SASARAN STRATEGIS
   ========================================================================== */
.targets-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.target-item {
    background: #f8fafc;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-lg, 10px);
    padding: 16px 18px;
    transition: all 0.2s ease;
}

.target-item:hover {
    border-color: #cbd5e1;
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
}

.target-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 14px;
    margin-bottom: 8px;
}

.target-title {
    font-size: 15.5px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin-bottom: 2px;
}

.target-indicator {
    font-size: 13.5px;
    color: var(--color-text-body, #334155);
    font-weight: 500;
}

.target-badge {
    padding: 4px 10px;
    border-radius: 9999px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: rgba(9, 55, 125, 0.06);
    color: var(--color-primary, #09377D);
    border: 1px solid rgba(9, 55, 125, 0.16);
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
    color: var(--color-text-muted, #64748b);
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
    transition: width 0.8s ease;
}

.target-keterangan {
    font-size: 12.5px;
    line-height: 1.4;
    color: var(--color-text-muted, #64748b);
    padding-top: 6px;
    border-top: 1px dashed #e2e8f0;
    margin-top: 6px;
}

/* ==========================================================================
   VISUALISASI PESERTA WEBINAR (SATU PANEL SEIMBANG - ZERO EMPTY SPACE)
   ========================================================================== */
.analytics-panel {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 32px;
    align-items: center;
}

.chart-doughnut-wrap {
    position: relative;
    width: 100%;
    height: 250px;
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
    font-size: 11.5px;
    color: var(--color-text-muted, #64748b);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-top: 3px;
}

.category-breakdown-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
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
    width: 10px;
    height: 10px;
    border-radius: 3px;
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
    height: 6px;
    background: #e2e8f0;
    border-radius: 9999px;
    overflow: hidden;
}

.cat-progress-bar {
    height: 100%;
    border-radius: 9999px;
}

/* ==========================================================================
   PERUSAHAAN MITRA TERLAYANI (RINGKAS & RAPI)
   ========================================================================== */
.companies-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.company-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-lg, 12px);
    padding: 18px;
    box-shadow: var(--shadow-sm, 0 1px 4px rgba(15, 23, 42, 0.03));
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
}

.company-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(9, 55, 125, 0.07);
    border-color: #cbd5e1;
}

.company-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
}

.company-logo-frame {
    width: 54px;
    height: 54px;
    background: #f8fafc;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 6px;
    flex-shrink: 0;
    overflow: hidden;
    position: relative;
    transition: all 0.2s ease;
}

.company-card:hover .company-logo-frame {
    background: #ffffff;
    border-color: #cbd5e1;
}

.company-logo-img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: filter 0.25s ease, transform 0.25s ease;
}

.company-card:hover .company-logo-img {
    filter: grayscale(0%) opacity(1);
    transform: scale(1.05);
}

.company-avatar-fallback {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    font-weight: 800;
    color: #64748b;
    background: #f1f5f9;
    border-radius: 6px;
    transition: all 0.25s ease;
}

.company-card:hover .company-avatar-fallback {
    color: var(--color-primary, #09377D);
    background: #e2e8f0;
}

.company-title-info {
    flex: 1;
    min-width: 0;
}

.company-name {
    font-size: 15.5px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin-bottom: 2px;
    line-height: 1.3;
}

.company-bidang {
    font-size: 12.5px;
    color: var(--color-text-muted, #64748b);
    display: flex;
    align-items: center;
    gap: 5px;
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
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 11.5px;
    font-weight: 600;
}

.comp-badge-status {
    background: rgba(9, 55, 125, 0.06);
    color: var(--color-primary, #09377D);
    border: 1px solid rgba(9, 55, 125, 0.15);
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 11.5px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 4px;
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
    width: 75px;
    flex-shrink: 0;
    color: #64748b;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 5px;
}

.comp-detail-row .val {
    color: #334155;
    font-weight: 600;
    flex: 1;
}

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */
@media (max-width: 900px) {
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

@media (max-width: 600px) {
    .capaian-title {
        font-size: 22px;
    }
    .kpi-grid {
        grid-template-columns: 1fr;
    }
    .content-box {
        padding: 20px 16px;
    }
    .target-header {
        flex-direction: column;
    }
}
</style>

<div class="capaian-page-wrap">

    <!-- Dekorasi Garis Abstrak K3 (Kiri Atas & Kanan Bawah) -->
    <div class="capaian-decor decor-top-left" aria-hidden="true">
        <img src="assets/decor_loop_navy.png" alt="" class="capaian-decor-img">
    </div>
    <div class="capaian-decor decor-bottom-right" aria-hidden="true">
        <img src="assets/decor_loop_navy.png" alt="" class="capaian-decor-img">
    </div>

    <div class="capaian-container">

        <!-- HEADER SECTION -->
        <header class="capaian-header">
            <h1 class="capaian-title"><?= htmlspecialchars($meta['title'] ?? 'Sasaran Strategis dan Indikator Kinerja Balai K3 Medan') ?></h1>
            <p class="capaian-subtitle">
                <?= htmlspecialchars($summary['deskripsi'] ?? 'Pelaksanaan kegiatan keselamatan dan kesehatan kerja serta realisasi pengujian lingkungan kerja Balai K3 Medan.') ?>
            </p>
            <div class="capaian-meta-bar">
                <span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Periode: <strong><?= htmlspecialchars($meta['periode_laporan'] ?? 'Januari 2026') ?></strong>
                </span>
                <span class="divider">&bull;</span>
                <span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                    Regulasi: <strong>Permenaker No. 1/2022</strong>
                </span>
                <span class="divider">&bull;</span>
                <span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    Status: <strong>Data Terverifikasi</strong>
                </span>
            </div>
        </header>

        <!-- KPI UTAMA (4 METRIC CARDS - UNIFIED NAVY COLORWAY) -->
        <section class="kpi-grid" aria-label="Ringkasan Indikator Kinerja Utama">
            <?php foreach ($kpiList as $item): 
                $kpiId = $item['id'] ?? 'pnbp';
                $svgIcon = $kpiSvgIcons[$kpiId] ?? $kpiSvgIcons['pnbp'];
            ?>
                <div class="kpi-card">
                    <div class="kpi-top">
                        <div class="kpi-icon-wrap">
                            <?= $svgIcon ?>
                        </div>
                        <span class="kpi-label"><?= htmlspecialchars($item['label'] ?? '') ?></span>
                    </div>
                    <div class="kpi-value"><?= htmlspecialchars($item['format'] ?? number_format($item['nilai'] ?? 0)) ?></div>
                    <div class="kpi-desc"><?= htmlspecialchars($item['keterangan'] ?? '') ?></div>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- SECTION 1: SASARAN STRATEGIS & TARGET VS REALISASI 2026 -->
        <section class="content-box">
            <div class="box-title-wrap">
                <h2 class="box-title">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    Sasaran Strategis & Target vs Realisasi Tahun <?= htmlspecialchars($meta['tahun'] ?? '2026') ?>
                </h2>
                <span class="box-tag">Perjanjian Kinerja Resmi</span>
            </div>

            <div class="targets-list">
                <?php foreach ($sasaranList as $sas): 
                    $targetVal = $sas['target'] ?? 0;
                    $realVal = $sas['realisasi'] ?? 0;
                    $persen = $sas['persen'] ?? 0;
                    $barWidth = min(100, max(0, $persen));
                ?>
                    <article class="target-item">
                        <div class="target-header">
                            <div>
                                <div class="target-title">
                                    <?= htmlspecialchars($sas['sasaran'] ?? '') ?>
                                </div>
                                <div class="target-indicator">
                                    <strong>Indikator:</strong> <?= htmlspecialchars($sas['indikator'] ?? '') ?>
                                </div>
                            </div>
                            <span class="target-badge">
                                <?php if ($persen >= 100): ?>
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 7 17l-5-5"/><path d="m22 10-7.5 7.5L13 16"/></svg>
                                    <?= number_format($persen, 1) ?>% (Tercapai)
                                <?php elseif ($persen > 0): ?>
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <?= number_format($persen, 2) ?>% (Berjalan)
                                <?php else: ?>
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    Terjadwal TW-II
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="progress-wrap">
                            <div class="progress-meta">
                                <span class="progress-target-text">
                                    Target: <strong><?= number_format($targetVal) ?> <?= htmlspecialchars($sas['satuan'] ?? '') ?></strong>
                                </span>
                                <span class="progress-realisasi-text">
                                    Realisasi: <strong><?= number_format($realVal) ?> <?= htmlspecialchars($sas['satuan'] ?? '') ?></strong>
                                </span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" style="width: <?= $barWidth ?>%;"></div>
                            </div>
                        </div>

                        <div class="target-keterangan">
                            <?= htmlspecialchars($sas['keterangan'] ?? '') ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- SECTION 2: VISUALISASI PESERTA WEBINAR NASIONAL (PADAT, SEIMBANG & ZERO EMPTY SPACE) -->
        <section class="content-box">
            <div class="box-title-wrap">
                <div>
                    <h2 class="box-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
                        <?= htmlspecialchars($sebaran['judul'] ?? 'Rincian Peserta Webinar Nasional (Toolbox Meeting)') ?>
                    </h2>
                </div>
                <span class="box-tag">Total: <?= number_format($sebaran['total'] ?? 590) ?> Peserta Daring</span>
            </div>

            <div class="analytics-panel">
                <!-- Kolom Kiri: Doughnut Chart dengan Metric Angka di Tengah -->
                <div class="chart-doughnut-wrap">
                    <canvas id="chartSebaranPeserta"></canvas>
                    <div class="chart-center-metric">
                        <div class="center-num"><?= number_format($sebaran['total'] ?? 590) ?></div>
                        <div class="center-lbl">Peserta</div>
                    </div>
                </div>

                <!-- Kolom Kanan: Rincian Lengkap Kategori dengan Bar Proporsional (Mengisi Ruang Rapi) -->
                <div class="category-breakdown-list">
                    <?php if (!empty($sebaran['kategori'])): ?>
                        <?php foreach ($sebaran['kategori'] as $kat): 
                            $barW = min(100, max(0, $kat['persen'] ?? 0));
                            $color = $kat['warna'] ?? '#09377D';
                        ?>
                            <div class="category-row">
                                <div class="cat-row-top">
                                    <div class="cat-label-wrap">
                                        <span class="cat-dot" style="background: <?= htmlspecialchars($color) ?>;"></span>
                                        <span><?= htmlspecialchars($kat['label'] ?? '') ?></span>
                                    </div>
                                    <div class="cat-stat-nums">
                                        <strong><?= number_format($kat['jumlah'] ?? 0) ?></strong> Orang
                                        (<?= number_format($kat['persen'] ?? 0, 1) ?>%)
                                    </div>
                                </div>
                                <div class="cat-progress-bg">
                                    <div class="cat-progress-bar" style="width: <?= $barW ?>%; background: <?= htmlspecialchars($color) ?>;"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- SECTION 3: PERUSAHAAN MITRA TERLAYANI (RINGKAS & RAPI, TANPA PARAMETER) -->
        <section class="content-box">
            <div class="box-title-wrap">
                <div>
                    <h2 class="box-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M8 10h.01"/><path d="M16 10h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M16 18h.01"/></svg>
                        Perusahaan yang Telah Memperoleh Layanan Pengujian K3
                    </h2>
                </div>
                <span class="box-tag">Total: <?= count($companies) ?> Perusahaan</span>
            </div>

            <div class="companies-grid">
                <?php foreach ($companies as $comp): 
                    $logoUrl = $comp['resolved_logo'] ?? '';
                    $domain = $comp['domain'] ?? '';
                    $initials = $comp['initials'] ?? 'K3';
                ?>
                    <article class="company-card">
                        <div class="company-header">
                            <!-- Logo Box dengan Internet Auto-fetch & Grayscale-to-Color Hover -->
                            <div class="company-logo-frame" title="<?= htmlspecialchars($comp['nama'] ?? '') ?>">
                                <?php if (!empty($logoUrl)): ?>
                                    <img src="<?= htmlspecialchars($logoUrl) ?>" 
                                         alt="Logo <?= htmlspecialchars($comp['singkatan'] ?? $comp['nama']) ?>" 
                                         class="company-logo-img"
                                         data-domain="<?= htmlspecialchars($domain) ?>"
                                         data-initials="<?= htmlspecialchars($initials) ?>"
                                         onerror="handleCompanyLogoError(this)">
                                <?php else: ?>
                                    <div class="company-avatar-fallback"><?= htmlspecialchars($initials) ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="company-title-info">
                                <h3 class="company-name"><?= htmlspecialchars($comp['nama'] ?? '') ?></h3>
                                <div class="company-bidang">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/></svg>
                                    <span><?= htmlspecialchars($comp['bidang'] ?? '') ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="company-badges">
                            <span class="comp-badge-service"><?= htmlspecialchars($comp['layanan'] ?? 'Pengujian K3') ?></span>
                            <span class="comp-badge-status">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <?= htmlspecialchars($comp['status'] ?? 'Selesai Terverifikasi') ?>
                            </span>
                        </div>

                        <div class="company-details-table">
                            <div class="comp-detail-row">
                                <span class="label">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    Lokasi
                                </span>
                                <span class="val"><?= htmlspecialchars($comp['lokasi'] ?? 'Sumatera Utara') ?></span>
                            </div>
                            <div class="comp-detail-row">
                                <span class="label">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    Periode
                                </span>
                                <span class="val"><?= htmlspecialchars($comp['periode'] ?? 'Januari 2026') ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
</div>

<!-- ==========================================================================
     SCRIPT CHART.JS & AUTO-FETCH LOGO ERROR HANDLING
     ========================================================================== -->
<script>
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

/**
 * Inisialisasi Chart.js
 */
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Chart === 'undefined') {
        return;
    }

    Chart.defaults.font.family = "'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";
    Chart.defaults.color = '#64748b';

    // DOUGHNUT CHART SEBARAN PESERTA DENGAN MONOKROMATIK NAVY PALETTE
    const sebaranData = <?= json_encode($sebaran['kategori'] ?? []) ?>;
    const doughnutCanvas = document.getElementById('chartSebaranPeserta');

    if (doughnutCanvas && sebaranData.length > 0) {
        const labels = sebaranData.map(item => item.label);
        const dataValues = sebaranData.map(item => item.jumlah);
        const bgColors = sebaranData.map(item => item.warna || '#09377D');

        new Chart(doughnutCanvas, {
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
                                return ' ' + context.label + ': ' + val + ' orang (' + percentage + '%)';
                            }
                        }
                    }
                },
                cutout: '72%'
            }
        });
    }
});
</script>

@endsection
