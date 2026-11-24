<?php
/**
 * Footer Layout Template
 * Footer resmi Balai K3 Medan untuk semua sub menu dan home
 * Tombol floating WhatsApp, tombol scroll ke atas, dan script.js
 */
?>

</main>

<!-- FOOTER RESMI BALAI K3 MEDAN -->
<footer class="site-footer <?= empty($isHome) ? 'subpage-footer' : 'home-footer' ?>">
    <?php if (empty($isHome)): ?>
    <!-- KONTEN FOOTER LENGKAP UNTUK SEMUA SUB MENU -->
    <div class="footer-main">
        <div class="container footer-container">

            <!-- KOLOM 1: IDENTITAS INSTANSI -->
            <div class="footer-col footer-col-brand">
                <div class="footer-brand-header">
                    <img src="<?= asset('assets/logokemnaker.png') ?>" alt="Kemnaker RI" class="footer-logo">
                    <div class="footer-brand-title">
                        <span class="footer-title-1">Balai Keselamatan dan</span>
                        <span class="footer-title-2">Kesehatan Kerja Medan</span>
                    </div>
                </div>
                <p class="footer-desc">
                    Unit Pelaksana Teknis (UPT) Pusat di bawah Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan dan Keselamatan dan Kesehatan Kerja, Kementerian Ketenagakerjaan Republik Indonesia.
                </p>
                <div class="footer-motto-badge">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span>Keselamatan &amp; Kesehatan Kerja Adalah Prioritas Kami</span>
                </div>
            </div>

            <!-- KOLOM 2: TAUTAN CEPAT & LAYANAN -->
            <div class="footer-col footer-col-links">
                <h4 class="footer-heading">Navigasi Utama</h4>
                <ul class="footer-links">
                    <li><a href="<?= url('/') ?>">Beranda</a></li>
                    <li><a href="<?= url('/#about') ?>">Profil Balai K3</a></li>
                    <li><a href="<?= url('tugas-fungsi') ?>">Tugas &amp; Fungsi</a></li>
                    <li><a href="<?= url('struktur') ?>">Struktur Organisasi</a></li>
                    <li><a href="<?= url('maklumat') ?>">Maklumat Pelayanan</a></li>
                    <li><a href="<?= url('standar') ?>">Standar Pelayanan</a></li>
                    <li><a href="<?= url('jadwal') ?>">Jam Pelayanan</a></li>
                    <li><a href="<?= url('jenis') ?>">Jenis Layanan K3</a></li>
                    <li><a href="<?= url('galeri') ?>">Galeri Kegiatan</a></li>
                    <li><a href="<?= url('capaian-kinerja') ?>">Capaian Kinerja</a></li>
                </ul>
            </div>

            <!-- KOLOM 3: KONTAK & JAM LAYANAN -->
            <div class="footer-col footer-col-contact">
                <h4 class="footer-heading">Kontak &amp; Layanan</h4>
                <ul class="footer-contact-list">
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </span>
                        <p>Jl. KL. Yos Sudarso No.64, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242</p>
                    </li>
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <p>(061) 6850613</p>
                    </li>
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </span>
                        <p>balaik3medan@gmail.com</p>
                    </li>
                    <li>
                        <span class="footer-contact-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </span>
                        <div>
                            <strong>Jam Pelayanan:</strong>
                            <p style="margin:2px 0 0 0;">Senin – Kamis: 07.30 – 16.00 WIB<br>Jumat: 07.30 – 16.30 WIB</p>
                        </div>
                    </li>
                </ul>

                <a href="https://bit.ly/Pengaduan_BK3Medan" target="_blank" rel="noopener noreferrer" class="footer-pengaduan-btn">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    <span>Layanan Pengaduan Online</span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 17l9.2-9.2M17 17V8H8"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
    <?php endif; ?>

    <!-- COPYRIGHT BAR (MUNCUL DI SEMUA SUB MENU & HOME) -->
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>&copy; <?= date('Y') ?> Balai Keselamatan dan Kesehatan Kerja Medan &mdash; Kementerian Ketenagakerjaan RI. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>

<!-- FLOATING ACTION (WHATSAPP) -->
<a href="https://wa.me/6285262229195" target="_blank" rel="noopener noreferrer" id="wa-float" aria-label="Hubungi via WhatsApp">
    <img src="<?= asset('assets/wa.png') ?>" alt="WhatsApp">
</a>

<!-- SCROLL KE ATAS -->
<button id="scrollTop" aria-label="Kembali ke atas">↑</button>

<!-- SCRIPT UTAMA -->
<script src="<?= asset('script.js') ?>?v=<?= filemtime(APP_ROOT . '/script.js') ?>"></script>

<?php if (!empty($extraScripts)) echo $extraScripts; ?>
</body>
</html>
