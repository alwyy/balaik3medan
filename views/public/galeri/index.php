<?php
/**
 * Galeri Kegiatan - Feed Instagram Resmi Balai K3 Medan (@balaik3medan)
 * Menampilkan 10 postingan terbaru kegiatan Balai K3 Medan secara dinamis.
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
   HALAMAN GALERI KEGIATAN (INSTAGRAM ACTIVITY FEED)
   ========================================================================== */
.gallery-page-wrap {
    background: linear-gradient(180deg, #070d17 0%, #0d1728 50%, #080e1a 100%);
    color: #f8fafc;
    min-height: 100vh;
    padding: 50px 0 90px;
    position: relative;
    overflow: hidden;
}

.gallery-ambient-glow {
    position: absolute;
    top: 60px;
    left: 50%;
    transform: translateX(-50%);
    width: 750px;
    height: 450px;
    background: radial-gradient(circle, rgba(14, 165, 233, 0.12) 0%, rgba(2, 132, 199, 0.04) 50%, transparent 75%);
    pointer-events: none;
    z-index: 1;
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
    margin: 0 auto 42px;
}

.gallery-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(14, 165, 233, 0.12);
    border: 1px solid rgba(56, 189, 248, 0.3);
    color: #38bdf8;
    padding: 6px 16px;
    border-radius: 9999px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 16px;
    letter-spacing: 0.03em;
}

.gallery-title {
    font-size: 38px;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.02em;
    margin-bottom: 14px;
    line-height: 1.25;
}

.gallery-subtitle {
    font-size: 16px;
    color: #94a3b8;
    line-height: 1.65;
    margin: 0 auto 28px;
}

/* PROFIL INSTAGRAM BAR */
.ig-profile-banner {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 10px 22px 10px 14px;
    border-radius: 9999px;
    margin-bottom: 36px;
    transition: transform 0.25s ease, border-color 0.25s ease;
}

.ig-profile-banner:hover {
    transform: translateY(-2px);
    border-color: rgba(220, 39, 67, 0.4);
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
    border: 2px solid #0c1424;
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
    color: #ffffff;
    display: flex;
    align-items: center;
    gap: 6px;
}

.ig-banner-desc {
    font-size: 12.5px;
    color: #94a3b8;
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
    font-weight: 600;
    text-decoration: none;
    margin-left: 8px;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.ig-banner-link:hover {
    transform: scale(1.04);
    opacity: 0.95;
    color: #ffffff;
}

/* GRID KARTU INSTAGRAM (10 TERBARU) */
.gallery-posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

/* KARTU POSTINGAN INSTAGRAM */
.gallery-ig-card {
    background: rgba(18, 26, 41, 0.85);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.3s ease,
                box-shadow 0.3s ease;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.gallery-ig-card:hover {
    transform: translateY(-5px);
    border-color: rgba(56, 189, 248, 0.35);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.5), 0 0 20px rgba(14, 165, 233, 0.15);
}

.gallery-ig-media {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
    background: #0f172a;
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
    background: rgba(12, 20, 36, 0.85);
    color: #38bdf8;
    border: 1px solid rgba(56, 189, 248, 0.3);
    padding: 4px 12px;
    border-radius: 9999px;
    font-size: 11.5px;
    font-weight: 600;
    backdrop-filter: blur(8px);
    z-index: 2;
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
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.45);
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
    border: 2px solid #0c1424;
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
    border: 2px solid #0c1424;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
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
    color: #f8fafc;
    line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
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
    color: #94a3b8;
}

.gallery-ig-snippet {
    font-size: 13px;
    color: #94a3b8;
    line-height: 1.55;
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
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 12px;
    font-size: 13.5px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.25s ease, border-color 0.25s ease, transform 0.2s ease;
}

.gallery-ig-btn:hover {
    background: linear-gradient(135deg, #e1306c, #fd1d1d);
    border-color: transparent;
    color: #ffffff;
    transform: translateY(-2px);
}

/* FOOTER CALL TO ACTION */
.gallery-footer-cta {
    text-align: center;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 36px 24px;
    margin-top: 20px;
}

.gallery-footer-cta h3 {
    font-size: 22px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 8px;
}

.gallery-footer-cta p {
    font-size: 14.5px;
    color: #94a3b8;
    margin-bottom: 20px;
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
    box-shadow: 0 6px 20px rgba(220, 39, 67, 0.35);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.gallery-btn-primary-ig:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 10px 28px rgba(220, 39, 67, 0.5);
    color: #ffffff;
}

@media (max-width: 768px) {
    .gallery-title {
        font-size: 30px;
    }
    .ig-profile-banner {
        flex-direction: column;
        border-radius: 20px;
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
    <div class="gallery-ambient-glow"></div>

    <div class="gallery-container">

        <!-- HEADER SECTION -->
        <div class="gallery-header">
            <div class="gallery-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
                <span>Dokumentasi Instagram Resmi</span>
            </div>
            <h1 class="gallery-title">Galeri Kegiatan Balai K3 Medan</h1>
            <p class="gallery-subtitle">
                Seluruh dokumentasi kegiatan pelayanan teknis, pengujian lingkungan kerja, bimtek keselamatan kerja, dan sosialisasi budaya K3 terhubung langsung dengan akun resmi <strong>@balaik3medan</strong>.
            </p>

            <!-- PROFIL INSTAGRAM BAR -->
            <div class="ig-profile-banner">
                <div class="ig-banner-avatar">
                    <div class="ig-banner-avatar-inner">
                        <img src="<?= asset('assets/kemnaker.png') ?>" alt="Logo Balai K3 Medan">
                    </div>
                </div>
                <div class="ig-banner-info">
                    <span class="ig-banner-handle">
                        <?= htmlspecialchars($profile['handle'] ?? '@balaik3medan') ?>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="#38bdf8" title="Terverifikasi">
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
                        <img src="<?= asset($act['image']) ?>" alt="<?= htmlspecialchars($act['title']) ?>" loading="lazy">
                        <span class="gallery-ig-tag"><?= htmlspecialchars($act['tag'] ?? 'Kegiatan K3') ?></span>
                    </div>

                    <!-- AVATAR LINGKARAN TENGAH -->
                    <div class="gallery-ig-avatar" title="@balaik3medan (Akun Resmi Balai K3 Medan)">
                        <div class="gallery-ig-avatar-inner">
                            <img src="<?= asset('assets/kemnaker.png') ?>" alt="Logo Balai K3 Medan">
                        </div>
                        <span class="gallery-ig-avatar-badge" title="Instagram">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </span>
                    </div>

                    <!-- KONTEN KARTU -->
                    <div class="gallery-ig-body">
                        <h2 class="gallery-ig-card-title"><?= htmlspecialchars($act['title']) ?></h2>
                        <div class="gallery-ig-account">
                            <span class="gallery-ig-handle">@balaik3medan</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="#38bdf8" title="Terverifikasi">
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
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #94a3b8;">
                    <p>Belum ada postingan kegiatan yang dimuat.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- FOOTER CTA -->
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
