<?php
/**
 * Galeri Kegiatan - Feed Instagram Resmi Balai K3 Medan (@balaik3medan)
 * Menampilkan 10-12 postingan terbaru kegiatan Balai K3 Medan secara dinamis.
 */
$activities = $activities ?? [];
$profile = $igProfile ?? [
    'username' => 'balaik3medan',
    'handle' => '@balaik3medan',
    'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw==',
    'name' => 'Balai K3 Medan'
];
?>

<style>
/* ==========================================================================
   HALAMAN GALERI KEGIATAN (THEME PUTIH & BERSIH K3 MEDAN)
   ========================================================================== */
.gallery-page-wrap {
    background: var(--color-bg, #f8fafc);
    color: var(--color-text-body, #334155);
    min-height: calc(100vh - 180px);
    padding: 24px 0 70px;
    position: relative;
    overflow: hidden;
}

/* Dekorasi Garis Abstrak (Monochrome Navy Opacity) */
.gallery-decor {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    user-select: none;
    opacity: 0.14;
    transition: opacity 0.3s ease;
}

.gallery-decor.decor-top-left {
    top: -40px;
    left: -70px;
    width: 440px;
    max-width: 36vw;
    height: auto;
    transform: rotate(-14deg);
}

.gallery-decor.decor-bottom-right {
    bottom: -60px;
    right: -80px;
    width: 500px;
    max-width: 40vw;
    height: auto;
    transform: rotate(166deg) scaleX(-1);
}

.gallery-decor-img {
    width: 100%;
    height: auto;
    display: block;
}

.gallery-container {
    max-width: 1220px;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 2;
}

/* HEADER SECTION */
.gallery-header {
    text-align: center;
    max-width: 820px;
    margin: 0 auto 36px;
}

.gallery-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(9, 55, 125, 0.08);
    border: 1px solid rgba(9, 55, 125, 0.18);
    color: var(--color-primary, #09377D);
    padding: 6px 16px;
    border-radius: 9999px;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 14px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.gallery-title {
    font-size: 34px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    letter-spacing: -0.01em;
    margin-bottom: 12px;
    line-height: 1.25;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.gallery-subtitle {
    font-size: 15.5px;
    color: var(--color-text-muted, #475569);
    line-height: 1.65;
    margin: 0 auto 24px;
}

/* PROFIL INSTAGRAM BAR (THEME PUTIH) */
.ig-profile-banner {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
    padding: 10px 22px 10px 14px;
    border-radius: 9999px;
    margin-bottom: 34px;
    transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
}

.ig-profile-banner:hover {
    transform: translateY(-2px);
    border-color: rgba(220, 39, 67, 0.35);
    box-shadow: 0 8px 24px rgba(220, 39, 67, 0.12);
}

.ig-banner-avatar {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    padding: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.ig-banner-avatar-inner {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 3px;
}

.ig-banner-avatar-inner img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.ig-banner-info {
    text-align: left;
    display: flex;
    flex-direction: column;
}

.ig-banner-handle {
    font-size: 15px;
    font-weight: 700;
    color: var(--color-primary, #09377D);
    display: flex;
    align-items: center;
    gap: 6px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.ig-banner-desc {
    font-size: 12.5px;
    color: #64748b;
}

.ig-banner-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #e1306c, #fd1d1d);
    color: #ffffff;
    padding: 8px 18px;
    border-radius: 9999px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    margin-left: 8px;
    transition: transform 0.2s ease, opacity 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 4px 12px rgba(225, 48, 108, 0.25);
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.ig-banner-link:hover {
    transform: scale(1.04);
    opacity: 0.95;
    color: #ffffff;
    box-shadow: 0 6px 18px rgba(225, 48, 108, 0.35);
}

/* GRID KARTU INSTAGRAM (THEME PUTIH) */
.gallery-posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 28px;
    margin-bottom: 50px;
}

/* KARTU POSTINGAN INSTAGRAM PUTIH */
.gallery-ig-card {
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 18px);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.3s ease,
                box-shadow 0.3s ease;
}

.gallery-ig-card:hover {
    transform: translateY(-4px);
    border-color: rgba(9, 55, 125, 0.25);
    box-shadow: 0 14px 34px rgba(9, 55, 125, 0.10);
}

.gallery-ig-media {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
    background: #f1f5f9;
}

.gallery-ig-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}

.gallery-ig-card:hover .gallery-ig-media img {
    transform: scale(1.04);
}

.gallery-ig-tag {
    position: absolute;
    top: 14px;
    right: 14px;
    background: rgba(9, 55, 125, 0.88);
    color: #ffffff;
    padding: 4px 12px;
    border-radius: 9999px;
    font-size: 11.5px;
    font-weight: 600;
    backdrop-filter: blur(8px);
    z-index: 2;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

/* AVATAR LINGKARAN TENGAH */
.gallery-ig-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    padding: 2.5px;
    margin: -25px auto 0;
    position: relative;
    z-index: 3;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.gallery-ig-card:hover .gallery-ig-avatar {
    transform: scale(1.12);
}

.gallery-ig-avatar-inner {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 4px;
}

.gallery-ig-avatar-inner img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

.gallery-ig-avatar-badge {
    position: absolute;
    bottom: -2px;
    right: -2px;
    width: 17px;
    height: 17px;
    border-radius: 50%;
    background: linear-gradient(45deg, #f09433, #dc2743, #bc1888);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.18);
    z-index: 4;
}

/* BODY KARTU */
.gallery-ig-body {
    padding: 14px 22px 24px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-grow: 1;
}

.gallery-ig-card-title {
    font-size: 17px;
    font-weight: 700;
    color: var(--color-text-main, #0f172a);
    line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.gallery-ig-account {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 12px;
}

.gallery-ig-handle {
    font-size: 13.5px;
    font-weight: 600;
    color: #64748b;
}

.gallery-ig-snippet {
    font-size: 13.5px;
    color: var(--color-text-body, #475569);
    line-height: 1.6;
    margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

.gallery-ig-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    background: #f8fafc;
    border: 1px solid var(--color-border, #e2e8f0);
    color: var(--color-primary, #09377D);
    padding: 10px 18px;
    border-radius: 10px;
    font-size: 13.5px;
    font-weight: 700;
    text-decoration: none;
    font-family: var(--font-title, 'Montserrat', sans-serif);
    transition: background 0.25s ease, border-color 0.25s ease, color 0.25s ease, transform 0.2s ease, box-shadow 0.2s ease;
}

.gallery-ig-btn:hover {
    background: linear-gradient(135deg, #e1306c, #fd1d1d);
    border-color: transparent;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(225, 48, 108, 0.3);
}

/* FOOTER CALL TO ACTION (THEME PUTIH) */
.gallery-footer-cta {
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: var(--radius-xl, 18px);
    padding: 36px 24px;
    margin-top: 20px;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
    border-top: 4px solid var(--color-primary, #09377D);
}

.gallery-footer-cta h3 {
    font-size: 22px;
    font-weight: 800;
    color: var(--color-primary, #09377D);
    margin-bottom: 8px;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.gallery-footer-cta p {
    font-size: 14.5px;
    color: var(--color-text-body, #475569);
    margin-bottom: 22px;
}

.gallery-btn-primary-ig {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    color: #ffffff;
    padding: 12px 28px;
    border-radius: 9999px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 6px 20px rgba(220, 39, 67, 0.28);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.gallery-btn-primary-ig:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 10px 28px rgba(220, 39, 67, 0.4);
    color: #ffffff;
}

@media (max-width: 768px) {
    .gallery-page-wrap {
        padding: 16px 0 50px;
    }
    .gallery-title {
        font-size: 26px;
    }
    .ig-profile-banner {
        flex-direction: column;
        border-radius: 18px;
        padding: 18px;
        text-align: center;
    }
    .ig-banner-info {
        text-align: center;
    }
    .ig-banner-link {
        margin-left: 0;
        margin-top: 6px;
    }
    .gallery-posts-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="gallery-page-wrap">

    <!-- DEKORASI LINE ABSTRACT (KIRI ATAS & KANAN BAWAH) -->
    <div class="gallery-decor decor-top-left" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="gallery-decor-img">
    </div>

    <div class="gallery-decor decor-bottom-right" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="gallery-decor-img">
    </div>

    <div class="gallery-container">

        <!-- HEADER SECTION -->
        <div class="gallery-header">
            <h1 class="gallery-title">Galeri Kegiatan Balai K3 Medan</h1>
            <p class="gallery-subtitle">
                Seluruh dokumentasi kegiatan pelayanan teknis, pengujian lingkungan kerja, bimtek keselamatan kerja, dan sosialisasi budaya K3 terhubung langsung dengan akun resmi <strong>@balaik3medan</strong>.
            </p>

            <!-- PROFIL INSTAGRAM BAR -->
            <div class="ig-profile-banner">
                <div class="ig-banner-avatar">
                    <div class="ig-banner-avatar-inner">
                        <img src="<?= asset('assets/kemnaker_mark.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker_mark.png') ?>" alt="Logo Balai K3 Medan">
                    </div>
                </div>
                <div class="ig-banner-info">
                    <span class="ig-banner-handle">
                        <?= htmlspecialchars($profile['handle'] ?? '@balaik3medan') ?>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="#09377D" title="Terverifikasi">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1.5 14.5-4-4 1.41-1.41L10.5 13.67l6.59-6.59L18.5 8.5l-8 8z"/>
                        </svg>
                    </span>
                    <span class="ig-banner-desc">Balai Keselamatan dan Kesehatan Kerja Medan &bull; Kemnaker RI</span>
                </div>
                <a href="<?= htmlspecialchars($profile['url'] ?? 'https://www.instagram.com/balaik3medan') ?>" target="_blank" rel="noopener noreferrer" class="ig-banner-link">
                    <span>Ikuti Akun</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>

        <!-- GRID 10 POSTINGAN TERBARU INSTAGRAM -->
        <div class="gallery-posts-grid">
            <?php if (!empty($activities)): ?>
                <?php foreach ($activities as $idx => $act): ?>
                <div class="gallery-ig-card" data-index="<?= $idx ?>">
                    <div class="gallery-ig-media img-skeleton-wrap">
                        <img src="<?= asset($act['image']) ?>" alt="<?= htmlspecialchars($act['title']) ?>" loading="lazy" decoding="async">
                        <span class="gallery-ig-tag"><?= htmlspecialchars($act['tag'] ?? '#KegiatanK3') ?></span>
                    </div>

                    <!-- AVATAR LINGKARAN TENGAH -->
                    <div class="gallery-ig-avatar" title="@balaik3medan (Akun Resmi Balai K3 Medan)">
                        <div class="gallery-ig-avatar-inner">
                            <img src="<?= asset('assets/kemnaker_mark.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker_mark.png') ?>" alt="Logo Balai K3 Medan">
                        </div>
                        <span class="gallery-ig-avatar-badge" title="Instagram">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </span>
                    </div>

                    <!-- KONTEN KARTU PUTIH -->
                    <div class="gallery-ig-body">
                        <h2 class="gallery-ig-card-title"><?= htmlspecialchars($act['title']) ?></h2>
                        <div class="gallery-ig-account">
                            <span class="gallery-ig-handle">@balaik3medan</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="#09377D" title="Terverifikasi">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1.5 14.5-4-4 1.41-1.41L10.5 13.67l6.59-6.59L18.5 8.5l-8 8z"/>
                            </svg>
                        </div>
                        <p class="gallery-ig-snippet"><?= htmlspecialchars($act['caption']) ?></p>

                        <a href="<?= htmlspecialchars($act['url']) ?>" target="_blank" rel="noopener noreferrer" class="gallery-ig-btn" aria-label="Buka postingan <?= htmlspecialchars($act['title']) ?> di Instagram">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                            </svg>
                            <span>Buka di Instagram</span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #64748b;">
                    <p>Belum ada postingan kegiatan yang dimuat.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- FOOTER CTA PUTIH -->
        <div class="gallery-footer-cta">
            <h3>Ikuti Dokumentasi Kegiatan Terkini di Media Sosial</h3>
            <p>Dapatkan informasi terbaru seputar keselamatan kerja, pengujian laboratorium, dan sertifikasi personel K3.</p>
            <a href="<?= htmlspecialchars($profile['url'] ?? 'https://www.instagram.com/balaik3medan') ?>" target="_blank" rel="noopener noreferrer" class="gallery-btn-primary-ig">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
                <span>Kunjungi @balaik3medan di Instagram</span>
            </a>
        </div>

    </div>
</div>
