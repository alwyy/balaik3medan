@extends('layouts.app')

@section('content')
<?php
/**
 * Jenis Layanan K3 - Balai K3 Medan
 * Desain Resmi Pemerintahan (Clean, Authoritative & Monochromatic Navy)
 * Bebas Data Dummy - Seluruh kategori dan jenis layanan terhubung dinamis ke CMS (data/jenis_layanan.json).
 * Menghilangkan icon berlebih agar tampilan fokus pada informasi parameter uji dan dasar hukum resmi.
 */

$meta = $meta ?? [];
$services = $services ?? [];
$categories = $categories ?? [];
$allServices = $allServices ?? $services;
$activeCategory = $activeCategory ?? 'all';
?>

<style>
/* ==========================================================================
   HALAMAN JENIS LAYANAN K3 (CLEAN GOVERNMENT EDITORIAL DESIGN)
   ========================================================================== */
.services-page-wrap {
    background: var(--color-bg, #f8fafc);
    color: var(--color-text-body, #334155);
    min-height: calc(100vh - 180px);
    padding: 24px 0 70px;
    position: relative;
    overflow: hidden;
}

/* Dekorasi Garis Halus K3 */
.services-decor {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    user-select: none;
    opacity: 0.08;
}

.services-decor.decor-top-left {
    top: -50px;
    left: -80px;
    width: 440px;
    max-width: 36vw;
    height: auto;
    transform: rotate(-14deg);
}

.services-decor.decor-bottom-right {
    bottom: -70px;
    right: -90px;
    width: 500px;
    max-width: 40vw;
    height: auto;
    transform: rotate(166deg) scaleX(-1);
}

.services-decor-img {
    width: 100%;
    height: auto;
    display: block;
}

.services-container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 2;
}

/* ==========================================================================
   HEADER SECTION
   ========================================================================== */
.services-header {
    text-align: center;
    max-width: 820px;
    margin: 0 auto 30px;
}

.services-badge {
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

.services-title {
    font-size: 32px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    letter-spacing: -0.015em;
    margin-bottom: 10px;
    line-height: 1.25;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.services-subtitle {
    font-size: 15px;
    color: var(--color-text-muted, #475569);
    line-height: 1.6;
    margin: 0 auto;
    max-width: 740px;
}

/* ==========================================================================
   CONTROL PANEL: SEARCH & CATEGORY FILTER TABS (CMS INTEGRATED)
   ========================================================================== */
.services-controls-panel {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 14px);
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
    padding: 18px 22px;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.services-search-row {
    position: relative;
}

.services-search-input {
    width: 100%;
    padding: 11px 16px 11px 16px;
    border: 1.5px solid var(--color-border, #e2e8f0);
    border-radius: 9px;
    font-size: 14px;
    background: #f8fafc;
    color: var(--color-text-body, #0f172a);
    font-family: inherit;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.services-search-input:focus {
    outline: none;
    background: #ffffff;
    border-color: var(--color-primary, #09377D);
    box-shadow: 0 0 0 3px rgba(9, 55, 125, 0.12);
}

.services-tabs-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.service-tab-btn {
    background: #f1f5f9;
    border: 1px solid transparent;
    color: #475569;
    padding: 7px 15px;
    border-radius: 9999px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.2s ease;
    user-select: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.service-tab-btn:hover {
    background: #e2e8f0;
    color: var(--color-primary, #09377D);
}

.service-tab-btn.active {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    box-shadow: 0 2px 8px rgba(9, 55, 125, 0.22);
}

.services-status-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    background: #f8fafc;
    border: 1px solid #edf2f7;
    border-radius: 8px;
    padding: 8px 14px;
    font-size: 12.5px;
    color: #64748b;
}

.services-status-bar strong {
    color: var(--color-primary, #09377D);
}

/* ==========================================================================
   GRID DAFTAR JENIS LAYANAN (CLEAN, NO ICON OVERUSE)
   ========================================================================== */
.services-grid-wrap {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
    margin-bottom: 35px;
}

.service-card-item {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 14px);
    padding: 26px 24px;
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
    border-top: 3.5px solid var(--color-primary, #09377D);
    display: flex;
    flex-direction: column;
    position: relative;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}

.service-card-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(9, 55, 125, 0.08);
    border-color: #cbd5e1;
}

.service-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 12px;
}

.service-num-badge {
    font-size: 13px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    background: rgba(9, 55, 125, 0.06);
    border: 1px solid rgba(9, 55, 125, 0.16);
    padding: 3px 10px;
    border-radius: 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.service-category-tag {
    font-size: 12px;
    font-weight: 600;
    color: #475569;
    background: #f1f5f9;
    padding: 3px 10px;
    border-radius: 9999px;
}

.service-card-title {
    font-size: 18.5px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0 0 10px;
    line-height: 1.35;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.service-card-desc {
    font-size: 14px;
    line-height: 1.6;
    color: var(--color-text-body, #334155);
    margin-bottom: 16px;
}

/* Lingkup Parameter Uji */
.service-scope-wrap {
    background: #f8fafc;
    border: 1px solid #edf2f7;
    border-radius: 8px;
    padding: 14px 16px;
    margin-bottom: 16px;
}

.service-scope-title {
    font-size: 12px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    text-transform: uppercase;
    letter-spacing: 0.03em;
    margin-bottom: 8px;
}

.service-scope-list {
    margin: 0;
    padding-left: 18px;
    font-size: 13px;
    color: #475569;
    line-height: 1.55;
}

.service-scope-list li {
    margin-bottom: 5px;
}

.service-scope-list li:last-child {
    margin-bottom: 0;
}

/* Metadata Footer Card */
.service-card-meta {
    margin-top: auto;
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-top: 14px;
    border-top: 1px dashed var(--color-border, #e2e8f0);
    font-size: 12.5px;
}

.meta-row {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.meta-label {
    color: #64748b;
    font-weight: 500;
}

.meta-value {
    color: #334155;
    font-weight: 600;
    text-align: right;
}

.service-card-actions {
    margin-top: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

.service-btn-contact {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary, #09377D);
    color: #ffffff;
    font-size: 13px;
    font-weight: 600;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
    width: 100%;
}

.service-btn-contact:hover {
    background: #124b9e;
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(9, 55, 125, 0.2);
}

/* State Pencarian / Filter Kosong */
.services-empty-state {
    display: none;
    text-align: center;
    padding: 48px 20px;
    background: #ffffff;
    border-radius: 14px;
    border: 1px dashed var(--color-border, #cbd5e1);
    grid-column: 1 / -1;
}

.services-empty-state h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0 0 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.services-empty-state p {
    font-size: 14px;
    color: #64748b;
    margin: 0 0 16px;
}

.btn-reset-filter {
    background: #f1f5f9;
    border: 1px solid #cbd5e1;
    color: var(--color-primary, #09377D);
    font-size: 13px;
    font-weight: 600;
    padding: 7px 16px;
    border-radius: 8px;
    cursor: pointer;
}

/* ==========================================================================
   CTA BANNER RESMI
   ========================================================================== */
.services-cta-box {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 14px);
    padding: 32px 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
    border-left: 4px solid var(--color-primary, #09377D);
}

.services-cta-text h3 {
    font-size: 20px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    margin: 0 0 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.services-cta-text p {
    font-size: 14px;
    color: var(--color-text-muted, #64748b);
    margin: 0;
    line-height: 1.55;
}

.services-cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary, #09377D);
    color: #ffffff;
    padding: 11px 24px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    white-space: nowrap;
    transition: all 0.2s ease;
}

.services-cta-btn:hover {
    background: #124b9e;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(9, 55, 125, 0.25);
}

/* ==========================================================================
   RESPONSIVE BREAKPOINTS
   ========================================================================== */
@media (max-width: 900px) {
    .services-grid-wrap {
        grid-template-columns: 1fr;
    }
    .services-cta-box {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 640px) {
    .services-title {
        font-size: 24px;
    }
    .services-controls-panel {
        padding: 16px 14px;
    }
    .service-card-item {
        padding: 20px 18px;
    }
}
</style>

<div class="services-page-wrap">

    <!-- Dekorasi Garis Halus K3 -->
    <div class="services-decor decor-top-left" aria-hidden="true">
        <img src="{{ asset('assets/decor_loop_navy.png') }}" alt="" class="services-decor-img">
    </div>
    <div class="services-decor decor-bottom-right" aria-hidden="true">
        <img src="{{ asset('assets/decor_loop_navy.png') }}" alt="" class="services-decor-img">
    </div>

    <div class="services-container">

        <!-- HEADER SECTION -->
        <header class="services-header">
            <span class="services-badge">Layanan Teknis Resmi</span>
            <h1 class="services-title">{{ $meta['title'] ?? 'Jenis Layanan Pengujian & Pembinaan K3' }}</h1>
            <p class="services-subtitle">
                {{ $meta['deskripsi'] ?? 'Layanan teknis pengujian lingkungan kerja, pemeriksaan kesehatan tenaga kerja, bimbingan teknis, dan pendampingan SMK3 oleh Balai K3 Medan.' }}
            </p>
        </header>

        <!-- ==================================================================
             CONTROL PANEL: PENCARIAN & FILTER KATEGORI (CMS READY)
             ================================================================== -->
        <section class="services-controls-panel" aria-label="Menu Filter Layanan K3">
            
            <!-- Pencarian Cepat Layanan -->
            <div class="services-search-row">
                <input type="text" 
                       id="serviceSearchInput" 
                       class="services-search-input" 
                       placeholder="Cari jenis layanan atau parameter uji (contoh: kebisingan, kimia, audiometri, ergonomi, SMK3)..."
                       value="{{ $searchKeyword }}"
                       autocomplete="off">
            </div>

            <!-- Tab Kategori Layanan (Dihasilkan Otomatis dari Data CMS) -->
            <div class="services-tabs-row" id="serviceTabsRow" role="tablist">
                @foreach ($categories as $cat)
                    <button type="button" 
                            class="service-tab-btn {{ $activeCategory === $cat['id'] ? 'active' : '' }}" 
                            data-category="{{ $cat['id'] }}"
                            role="tab"
                            aria-selected="{{ $activeCategory === $cat['id'] ? 'true' : 'false' }}">
                        {{ $cat['nama'] }}
                    </button>
                @endforeach
            </div>

            <!-- Status Bar Informasi & CMS Status -->
            <div class="services-status-bar">
                <div>
                    Menampilkan <strong id="serviceCountDisplay">{{ count($services) }}</strong> jenis layanan terdaftar
                </div>
                <div>
                    Status: <strong>{{ $meta['status'] ?? 'Aktif Terverifikasi CMS' }}</strong>
                </div>
            </div>

        </section>

        <!-- ==================================================================
             GRID DAFTAR JENIS LAYANAN
             ================================================================== -->
        <div class="services-grid-wrap" id="servicesGrid">
            
            @forelse ($allServices as $srv)
                @php
                    $sId = $srv['id'] ?? '';
                    $sNum = $srv['nomor'] ?? '';
                    $sCatId = $srv['kategori_id'] ?? '';
                    $sCatName = $srv['kategori_nama'] ?? '';
                    $sJudul = $srv['judul'] ?? '';
                    $sDesc = $srv['ringkasan'] ?? '';
                    $sHukum = $srv['dasar_hukum'] ?? '';
                    $sObjek = $srv['objek_layanan'] ?? '';
                    $sParams = $srv['lingkup_parameter'] ?? [];
                    $sKeywords = mb_strtolower($sJudul . ' ' . $sDesc . ' ' . $sCatName . ' ' . implode(' ', $sParams));
                @endphp
                <article class="service-card-item" 
                         data-id="{{ $sId }}" 
                         data-category="{{ $sCatId }}"
                         data-keywords="{{ $sKeywords }}">
                    
                    <div class="service-card-header">
                        <span class="service-num-badge">{{ $sNum ?: 'LAY' }}</span>
                        <span class="service-category-tag">{{ $sCatName }}</span>
                    </div>

                    <h2 class="service-card-title">{{ $sJudul }}</h2>
                    <p class="service-card-desc">{{ $sDesc }}</p>

                    @if (!empty($sParams))
                        <div class="service-scope-wrap">
                            <div class="service-scope-title">Lingkup Pengujian &amp; Parameter:</div>
                            <ul class="service-scope-list">
                                @foreach ($sParams as $param)
                                    <li>{{ $param }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="service-card-meta">
                        @if (!empty($sHukum))
                            <div class="meta-row">
                                <span class="meta-label">Dasar Hukum:</span>
                                <span class="meta-value">{{ $sHukum }}</span>
                            </div>
                        @endif
                        @if (!empty($sObjek))
                            <div class="meta-row">
                                <span class="meta-label">Sasaran Objek:</span>
                                <span class="meta-value">{{ $sObjek }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="service-card-actions">
                        <a href="{{ url('/#contact') }}" class="service-btn-contact">
                            Konsultasi &amp; Permohonan Pengujian
                        </a>
                    </div>

                </article>
            @empty
                <div class="services-empty-state" style="display: block;">
                    <h3>Belum Ada Data Layanan</h3>
                    <p>Data jenis layanan belum dipush dari sistem CMS Balai K3 Medan.</p>
                </div>
            @endforelse

            <!-- State Pencarian Kosong (Client-side) -->
            <div class="services-empty-state" id="serviceEmptySearch">
                <h3>Layanan Tidak Ditemukan</h3>
                <p>Tidak ada jenis layanan atau parameter uji yang cocok dengan kata kunci pencarian Anda.</p>
                <button type="button" class="btn-reset-filter" id="btnResetSearch">Reset Pencarian &amp; Filter</button>
            </div>

        </div>

        <!-- ==================================================================
             CTA BANNER RESMI
             ================================================================== -->
        <section class="services-cta-box" aria-label="Permohonan Layanan K3">
            <div class="services-cta-text">
                <h3>Membutuhkan Pengujian Teknis atau Bimbingan K3?</h3>
                <p>
                    Hubungi tim pelayanan Balai K3 Medan untuk permohonan pengujian lingkungan kerja,
                    pemeriksaan kesehatan tenaga kerja, atau konsultasi pemenuhan standar regulasi K3 nasional.
                </p>
            </div>
            <a href="{{ url('/#contact') }}" class="services-cta-btn">
                Hubungi Petugas Layanan
            </a>
        </section>

    </div>
</div>

<!-- ==========================================================================
     SCRIPT FILTER & LIVE SEARCH CEPAT (MOTION INTERACTIVE)
     ========================================================================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('serviceSearchInput');
    const tabButtons = document.querySelectorAll('.service-tab-btn');
    const serviceCards = document.querySelectorAll('.service-card-item');
    const emptyState = document.getElementById('serviceEmptySearch');
    const countDisplay = document.getElementById('serviceCountDisplay');
    const btnResetSearch = document.getElementById('btnResetSearch');

    let currentCategory = '<?= $activeCategory ?>';

    function applyFilterAndSearch() {
        const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        let visibleCount = 0;
        const visibleCards = [];

        serviceCards.forEach(card => {
            const cardCat = card.getAttribute('data-category') || '';
            const cardKeywords = (card.getAttribute('data-keywords') || '').toLowerCase();
            const textContent = card.innerText.toLowerCase();

            const matchesCategory = (currentCategory === 'all') || (cardCat === currentCategory);
            const matchesSearch = !query || textContent.includes(query) || cardKeywords.includes(query);

            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex';
                card.style.opacity = '1';
                card.style.transform = 'none';
                visibleCards.push(card);
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countDisplay) {
            countDisplay.textContent = visibleCount;
        }

        if (emptyState) {
            emptyState.style.display = (visibleCount === 0) ? 'block' : 'none';
        }

        // Efek Motion jika tersedia
        if (visibleCards.length > 0 && typeof Motion !== 'undefined') {
            try {
                Motion.animate(
                    visibleCards,
                    { opacity: [0, 1], y: [16, 0] },
                    {
                        type: 'spring',
                        stiffness: 380,
                        damping: 26,
                        duration: 0.35,
                        delay: typeof Motion.stagger === 'function' ? Motion.stagger(0.04) : 0
                    }
                );
            } catch (err) {}
        }

        // Update URL query params secara transparan
        const url = new URL(window.location);
        if (currentCategory !== 'all') {
            url.searchParams.set('kategori', currentCategory);
        } else {
            url.searchParams.delete('kategori');
        }
        if (query) {
            url.searchParams.set('q', query);
        } else {
            url.searchParams.delete('q');
        }
        window.history.replaceState({}, '', url);
    }

    // Event Tab Kategori
    tabButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            tabButtons.forEach(b => {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');

            currentCategory = this.getAttribute('data-category') || 'all';
            applyFilterAndSearch();
        });
    });

    // Event Input Live Search
    if (searchInput) {
        searchInput.addEventListener('input', applyFilterAndSearch);
    }

    // Reset Filter Button
    if (btnResetSearch) {
        btnResetSearch.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            currentCategory = 'all';
            tabButtons.forEach(b => {
                const isAll = (b.getAttribute('data-category') === 'all');
                b.classList.toggle('active', isAll);
                b.setAttribute('aria-selected', isAll ? 'true' : 'false');
            });
            applyFilterAndSearch();
        });
    }

    // Initial filter jika query parameter terisi
    if (currentCategory !== 'all' || (searchInput && searchInput.value.trim() !== '')) {
        applyFilterAndSearch();
    }
});
</script>

@endsection
