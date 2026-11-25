@extends('layouts.app')

@section('content')
<section class="home" id="home">
    <div class="slider" id="slider">
        <div class="slide active" style="background-image:url('<?= asset('assets/gambar 4.jpeg') ?>')"></div>
        <div class="slide" style="background-image:url('<?= asset('assets/bimbingan teknis.jpg') ?>')"></div>
        <div class="slide" style="background-image:url('<?= asset('assets/overlay.jpg') ?>')"></div>
    </div>

    <!-- OVERLAY -->
    <div class="hero-overlay"></div>

    <!-- HERO TEXT (Taste-Skill Rule 5: data-enter & fold-action) -->
    <div class="home-text" data-enter>
        <div class="hero-badge hero-enter-1">KEMENTERIAN KETENAGAKERJAAN RI</div>
        <h1 class="hero-enter-2">Selamat Datang di Situs Resmi</h1>
        <h2 class="hero-enter-2">Balai Keselamatan dan Kesehatan Kerja Medan</h2>
        <p class="hero-enter-3">Kecepatan, Akurasi, Ketepatan, dan Akuntabel dalam Pelayanan K3</p>
        <div class="hero-actions hero-enter-4">
            <a href="<?= url('layanan') ?>" class="btn btn-primary btn-shimmer">
                Lihat Layanan K3
            </a>
            <a href="<?= url('maklumat') ?>" class="btn btn-secondary">
                Maklumat Pelayanan
            </a>
        </div>
    </div>
</section>

<!-- CARD LAYANAN (KEGIATAN LAYANAN & CAPAIAN KINERJA) -->
<section class="services" id="services">
    <div class="container services-grid">

        <div class="service-card">
            <div class="icon-circle">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
            </div>
            <h3>Kegiatan Layanan K3</h3>
            <p>
                Paket pelatihan K3 bagi tenaga medis, paramedis,
                dan industri dengan sertifikasi resmi.
            </p>
            <a href="<?= url('layanan') ?>" class="service-card-link">
                Lihat Layanan
            </a>
        </div>

        <div class="service-card">
            <div class="icon-circle">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="20" x2="18" y2="10"/>
                    <line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6" y1="20" x2="6" y2="14"/>
                </svg>
            </div>
            <h3>Capaian Kinerja K3</h3>
            <p>
                Pengujian lingkungan kerja, udara, faktor fisik,
                kualitas air, hingga pemeriksaan kesehatan.
            </p>
            <a href="<?= url('capaian-kinerja') ?>" class="service-card-link">
                Lihat Capaian
            </a>
        </div>

    </div>
</section>

<!-- SECTION AKTIVITAS INSTAGRAM CAROUSEL (DI BAWAH MENU LAYANAN) -->
<section class="activity-section" id="aktivitas">
    <div class="activity-bg-glow"></div>
    <div class="container activity-header-wrap">
        <h2 class="activity-title">Aktivitas Terkini Balai K3 Medan</h2>
        <p class="activity-subtitle">
            Ikuti dokumentasi kegiatan pelayanan, bimbingan teknis, dan pengujian K3 secara langsung dari media sosial resmi kami.
        </p>
    </div>

    <div class="activity-carousel-wrapper" id="activityCarouselWrapper" aria-roledescription="carousel" aria-label="Aktivitas Instagram Balai K3 Medan">
        
        <!-- BUTTON PREV (KIRI) DENGAN HOVER COLOR EFFECT -->
        <button type="button" class="activity-carousel-btn btn-prev" id="activityPrevBtn" aria-label="Lihat Aktivitas Sebelumnya" title="Sebelumnya">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>

        <!-- VIEWPORT & TRACK -->
        <div class="activity-carousel-viewport" id="activityViewport">
            <div class="activity-carousel-track" id="activityTrack">
                <?php 
                $feedActivities = !empty($activities) ? $activities : [
                    ['id' => 1, 'image' => 'assets/activities/post_1.jpg', 'tag' => '#FaktorFisika', 'title' => 'Pengujian Kebisingan & Getaran Mesin Industri', 'caption' => 'Pengukuran parameter kebisingan, getaran mekanis, dan pencahayaan kerja pada area manufaktur di wilayah Sumatera Utara.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 2, 'image' => 'assets/activities/post_2.jpg', 'tag' => '#BimtekSMK3', 'title' => 'Bimtek Penerapan Audit Sistem Manajemen K3', 'caption' => 'Peningkatan kompetensi auditor internal dan implementasi SMK3 PP No. 50 Tahun 2012 bagi perusahaan mitra.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 3, 'image' => 'assets/activities/post_3.jpg', 'tag' => '#Ergonomi', 'title' => 'Penilaian Beban Kerja & Postur Ergonomi', 'caption' => 'Analisis REBA & RULA untuk evaluasi risiko muskuloskeletal pada operator lini perakitan pabrik kelapa sawit.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 4, 'image' => 'assets/activities/post_4.jpg', 'tag' => '#KesehatanKerja', 'title' => 'Pemeriksaan Audiometri & Spirometri Tenaga Kerja', 'caption' => 'Pemeriksaan fungsi pendengaran dan kapasitas paru berkala untuk deteksi dini pencegahan penyakit akibat kerja (PAK).', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 5, 'image' => 'assets/activities/post_5.jpg', 'tag' => '#HigieneIndustri', 'title' => 'Pengujian Debu Respirabel & Kualitas Udara Kerja', 'caption' => 'Sampling debu inhalabel dan analisis senyawa kimia udara lingkungan kerja di area peleburan logam dan semen.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 6, 'image' => 'assets/activities/post_6.jpg', 'tag' => '#UjiKimia', 'title' => 'Analisis Laboratorium Gas Toksik & Uap Logam', 'caption' => 'Pengujian presisi konsentrasi gas berbahaya menggunakan Spektrofotometer AAS dan GC-MS di laboratorium terakreditasi.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 7, 'image' => 'assets/activities/post_7.jpg', 'tag' => '#FaktorFisika', 'title' => 'Pengukuran Iklim Kerja & Indeks Suhu Basah Bola', 'caption' => 'Pemantauan tekanan panas (heat stress) ISBB di boiler room guna menentukan rasio kerja-istirahat yang aman bagi pekerja.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 8, 'image' => 'assets/activities/post_8.jpg', 'tag' => '#EdukasiK3', 'title' => 'Sosialisasi Budaya Keselamatan ke Kampus & SMK', 'caption' => 'Penyebarluasan kesadaran norma K3 bagi calon tenaga kerja muda untuk mewujudkan zero accident di masa depan.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 9, 'image' => 'assets/activities/post_9.jpg', 'tag' => '#HigieneIndustri', 'title' => 'Inspeksi Ventilasi Industri & Local Exhaust', 'caption' => 'Pengukuran laju alir udara dan efisiensi sistem ducting cerobong pabrik pengolahan karet di Sumatera.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 10, 'image' => 'assets/activities/post_10.jpg', 'tag' => '#BimtekSMK3', 'title' => 'Peringatan Bulan K3 Nasional & Apel Akbar', 'caption' => 'Membangun ekosistem ketenagakerjaan yang unggul dengan konsistensi penerapan norma K3 di seluruh lini operasional.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 11, 'image' => 'assets/activities/post_11.jpg', 'tag' => '#FaktorFisika', 'title' => 'Pengujian Tingkat Penerangan & Iluminasi Kerja', 'caption' => 'Pengukuran lux pencahayaan pada ruang kendali dan laboratorium presisi sesuai standar Permenaker No. 5 Tahun 2018.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw=='],
                    ['id' => 12, 'image' => 'assets/activities/post_12.jpg', 'tag' => '#Ergonomi', 'title' => 'Pengujian Faktor Psikososial & Kelelahan Kerja', 'caption' => 'Asesmen reaksi waktu dan tingkat kelelahan kerja pada pengemudi alat berat dan operator shift malam.', 'url' => 'https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw==']
                ];
                foreach ($feedActivities as $idx => $act): 
                ?>
                <div class="activity-card" data-activity-id="<?= $idx ?>">
                    <div class="activity-card-media img-skeleton-wrap">
                        <img src="<?= asset($act['image']) ?>" alt="<?= htmlspecialchars($act['title']) ?>" loading="lazy" decoding="async">
                        <span class="activity-card-tag"><?= htmlspecialchars($act['tag'] ?? '#KegiatanK3') ?></span>
                    </div>

                    <!-- AVATAR LINGKARAN INSTAGRAM DENGAN LOGO KEMNAKER RESMI -->
                    <div class="activity-avatar" title="@balaik3medan (Akun Resmi Balai K3 Medan)">
                        <div class="activity-avatar-ring">
                            <img src="<?= asset('assets/kemnaker.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker.png') ?>" alt="Logo Balai K3 Medan">
                        </div>
                        <span class="activity-avatar-ig-badge" title="Instagram Resmi">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </span>
                    </div>

                    <!-- KONTEN KARTU -->
                    <div class="activity-card-body">
                        <h3 class="activity-card-title"><?= htmlspecialchars($act['title']) ?></h3>
                        <div class="activity-card-account">
                            <span class="account-handle">@balaik3medan</span>
                            <span class="verified-badge" title="Akun Resmi Terverifikasi">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="#5FBAE2">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1.5 14.5-4-4 1.41-1.41L10.5 13.67l6.59-6.59L18.5 8.5l-8 8z"/>
                                </svg>
                            </span>
                        </div>
                        <p class="activity-card-snippet"><?= htmlspecialchars($act['caption']) ?></p>
                        
                        <!-- TOMBOL ACTION (SEPERTI REFERENSI) -->
                        <a href="<?= htmlspecialchars($act['url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-activity-follow" aria-label="Buka postingan <?= htmlspecialchars($act['title']) ?> di Instagram">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                            </svg>
                            <span>Lihat Postingan</span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- BUTTON NEXT (KANAN) DENGAN HOVER COLOR EFFECT -->
        <button type="button" class="activity-carousel-btn btn-next" id="activityNextBtn" aria-label="Lihat Aktivitas Berikutnya" title="Berikutnya">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>

    </div>

    <!-- CAROUSEL INDICATORS / DOTS & INSTAGRAM PROFILE LINK -->
    <div class="activity-footer-controls">
        <div class="activity-dots" id="activityDots"></div>
        <div class="activity-ig-cta">
            <a href="https://www.instagram.com/balaik3medan?utm_source=ig_web_button_share_sheet&fqnt=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="btn-ig-visit">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                </svg>
                <span>Ikuti Kami di Instagram @balaik3medan</span>
            </a>
        </div>
    </div>
</section>


<!-- ABOUT / PROFIL -->
<section class="about-modern" id="about">
    <div class="container about-container">
        <!-- FOTO WITH SKELETON SHIMMER -->
        <div class="about-image img-skeleton-wrap">
            <img src="<?= asset('assets/galeri77.png') ?>" alt="Tentang Balai K3 Medan" loading="lazy">
        </div>
        <!-- KETERANGAN -->
        <div class="about-desc">
            <div class="section-badge">Profil Lembaga</div>
            <h2>Balai Keselamatan dan Kesehatan Kerja Medan</h2>
            <p>
                Balai Keselamatan dan Kesehatan Kerja (K3) Medan merupakan Unit Pelaksana Teknis (UPT) di lingkungan Kementerian Ketenagakerjaan Republik Indonesia yang berada di bawah dan bertanggung jawab kepada Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan dan Keselamatan dan Kesehatan Kerja (Ditjen Binwasnaker dan K3).
            </p>

            <p>
                Pembentukan, tugas, fungsi, dan susunan organisasi Balai K3 Medan berpedoman pada Peraturan Menteri Ketenagakerjaan Republik Indonesia Nomor 1 Tahun 2022 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis di Bidang Keselamatan dan Kesehatan Kerja.
            </p>

            <p>
                Wilayah kerja Balai K3 Medan meliputi:
                Provinsi Aceh, Sumatera Utara, Sumatera Barat, Riau, Kepulauan Riau, Jambi, Bangka Belitung, Bengkulu, dan Sumatera Selatan.
            </p>
        </div>
    </div>
</section>

<!-- VISI DAN MISI (MODERN BENTO & INTERACTIVE PILAR) -->
<section class="visi-misi-section" id="visi-misi">
    <div class="visi-misi-ambient-glow"></div>
    <div class="container">
        
        <!-- SECTION HEADER -->
        <div class="visi-misi-header" data-enter>
            <h2 class="section-title vm-title">Visi &amp; Misi</h2>
            <p class="vm-subtitle">
                Landasan arah strategis Balai K3 Medan dalam mewujudkan keselamatan, kesehatan, dan produktivitas tenaga kerja di seluruh wilayah Pulau Sumatera.
            </p>
        </div>

        <div class="visi-misi-content-wrap">

            <!-- 1. GRAND VISI BANNER CARD -->
            <div class="vm-card-visi">
                <div class="vm-visi-overlay-pattern"></div>
                    <div class="vm-quote-icon">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21c3 0 7-1 7-8V5c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2 0 4-1 6-3 8z"/>
                            <path d="M15 21c3 0 7-1 7-8V5c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2 0 4-1 6-3 8z"/>
                        </svg>
                    </div>
                    <blockquote class="vm-visi-text">
                        &ldquo;Terpenuhinya syarat Keselamatan dan Kesehatan Kerja (K3) di tempat kerja guna mewujudkan tenaga kerja yang produktif dan sejahtera.&rdquo;
                    </blockquote>
                </div>
            </div>

            <!-- 2. TIGA PILAR MISI -->
            <div class="vm-misi-grid">
                
                <!-- MISI 1 -->
                <div class="vm-misi-card card-cyan">
                    <div class="vm-misi-card-header">
                        <div class="vm-misi-icon-wrap">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 2v7.5a2 2 0 0 1-.2 1L4.7 20.6a1 1 0 0 0 .9 1.4h12.8a1 1 0 0 0 .9-1.4L14.2 10.5a2 2 0 0 1-.2-1V2"/>
                                <path d="M8.5 2h7"/>
                                <path d="M7 16h10"/>
                            </svg>
                        </div>
                        <span class="vm-misi-number">01</span>
                    </div>
                    <span class="vm-misi-tag">Pengujian &amp; Akreditasi</span>
                    <h3 class="vm-misi-title">Layanan Uji K3 &amp; Laboratorium</h3>
                    <p class="vm-misi-desc">
                        Memberikan layanan pengujian K3 bagi masyarakat industri melalui laboratorium terakreditasi KAN dan SDM kompeten, serta layanan bantuan teknis pemenuhan syarat K3.
                    </p>
                    <div class="vm-misi-footer">
                        <span class="vm-feature-chip">Lab Terakreditasi</span>
                        <span class="vm-feature-chip">Bantuan Teknis</span>
                    </div>
                </div>

                <!-- MISI 2 -->
                <div class="vm-misi-card card-amber">
                    <div class="vm-misi-card-header">
                        <div class="vm-misi-icon-wrap">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                        </div>
                        <span class="vm-misi-number">02</span>
                    </div>
                    <span class="vm-misi-tag">Kapasitas &amp; Pelatihan</span>
                    <h3 class="vm-misi-title">Pelatihan Tenaga Kerja Terampil</h3>
                    <p class="vm-misi-desc">
                        Mempersiapkan tenaga kerja yang terampil di bidang K3 melalui pelatihan sesuai kebutuhan perusahaan dan pemetaan potensi bahaya di lingkungan tempat kerja.
                    </p>
                    <div class="vm-misi-footer">
                        <span class="vm-feature-chip">Uji Kompetensi</span>
                        <span class="vm-feature-chip">Sertifikasi Resmi</span>
                    </div>
                </div>

                <!-- MISI 3 -->
                <div class="vm-misi-card card-emerald">
                    <div class="vm-misi-card-header">
                        <div class="vm-misi-icon-wrap">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="2" y1="12" x2="22" y2="12"/>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1 4-10z"/>
                            </svg>
                        </div>
                        <span class="vm-misi-number">03</span>
                    </div>
                    <span class="vm-misi-tag">Edukasi &amp; Kemitraan</span>
                    <h3 class="vm-misi-title">Penyebaran Budaya &amp; Informasi K3</h3>
                    <p class="vm-misi-desc">
                        Memberikan kontribusi aktif dalam penyebaran informasi, literasi, dan edukasi K3 kepada masyarakat luas, perguruan tinggi, serta jejaring pengawas ketenagakerjaan.
                    </p>
                    <div class="vm-misi-footer">
                        <span class="vm-feature-chip">Jejaring 9 Provinsi</span>
                        <span class="vm-feature-chip">Edukasi Publik</span>
                    </div>
                </div>

            </div>
</section>

<!-- WILAYAH KERJA -->
<section class="wilayah-section" id="wilayah-kerja">
    <div class="container">
        <h2 class="section-title">Wilayah Kerja Balai K3 Medan</h2>

        <div class="wilayah-container">

            <!-- PETA INTERAKTIF (LEAFLET.JS) -->
            <div class="wilayah-map-wrap" id="wilayahMapWrap" data-lenis-prevent>
                <div id="wilayah-map" class="wilayah-map-container" data-lenis-prevent aria-label="Peta Interaktif Wilayah Kerja Balai K3 Medan"></div>
                
                <div class="map-hint-pill">
                    <span class="hint-dot"></span>
                    <span>Klik wilayah peta/daftar</span>
                </div>

                <!-- TOMBOL RESET TAMPILAN -->
                <button type="button" class="btn-map-reset" id="btnResetMap" title="Kembalikan Tampilan Seluruh Sumatera">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                    <span>Reset</span>
                </button>
            </div>

            <!-- DAFTAR 9 PROVINSI INTERAKTIF -->
            <div class="wilayah-content">
                <div class="wilayah-content-header">
                    <h2>Cakupan 9 Provinsi Wilayah Kerja</h2>
                    <p class="wilayah-lead">Berdasarkan Permenaker RI Nomor 1 Tahun 2022, Balai K3 Medan mengampu pelayanan dan pengujian K3 di 9 provinsi Pulau Sumatera:</p>
                </div>

                <!-- DAFTAR RESMI 9 PROVINSI -->
                <div class="wilayah-list" id="wilayahList" role="list">
                    <button type="button" class="wilayah-item is-pusat active" data-province="sumut" role="listitem" title="Lihat lokasi Sumatera Utara">
                        <span class="wilayah-dot dot-pusat"></span>
                        <div class="wilayah-item-text">
                            <strong>Sumatera Utara</strong>
                        </div>
                        <span class="wilayah-badge-tag">Kantor Balai</span>
                    </button>

                    <button type="button" class="wilayah-item" data-province="aceh" role="listitem" title="Lihat lokasi Aceh">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Aceh</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="riau" role="listitem" title="Lihat lokasi Riau">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Riau</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="kepri" role="listitem" title="Lihat lokasi Kepulauan Riau">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Kepulauan Riau</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="sumbar" role="listitem" title="Lihat lokasi Sumatera Barat">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Sumatera Barat</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="jambi" role="listitem" title="Lihat lokasi Jambi">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Jambi</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="bengkulu" role="listitem" title="Lihat lokasi Bengkulu">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Bengkulu</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="sumsel" role="listitem" title="Lihat lokasi Sumatera Selatan">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Sumatera Selatan</strong>
                        </div>
                    </button>

                    <button type="button" class="wilayah-item" data-province="babel" role="listitem" title="Lihat lokasi Kepulauan Bangka Belitung">
                        <span class="wilayah-dot"></span>
                        <div class="wilayah-item-text">
                            <strong>Kepulauan Bangka Belitung</strong>
                        </div>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- CONTACT -->
<section class="contact-ref" id="contact">

    <div class="contact-overlay"></div>

    <div class="container contact-content">

        <!-- KIRI -->
        <div class="contact-left">
            <img src="<?= asset('assets/logokemnaker.png') ?>" class="contact-logo" alt="Logo Kemnaker">

            <div class="contact-logo-title">
                <span class="contact-line-1">Balai Keselamatan dan</span>
                <span class="contact-line-2">Kesehatan Kerja Medan</span>
            </div>

            <div class="contact-pengaduan-card">
                <div class="contact-pengaduan-header">
                    <span class="contact-pengaduan-header-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </span>
                    <h3 class="contact-pengaduan-title">Layanan Pengaduan &amp; Kendala</h3>
                </div>
                <p class="contact-pengaduan-desc">
                    Jika ada laporan, masukan, atau kendala terkait pelayanan kami, Anda dapat mengisi formulir pengaduan secara online melalui Google Form berikut:
                </p>
                <a href="https://bit.ly/Pengaduan_BK3Medan" target="_blank" rel="noopener noreferrer" class="contact-pengaduan-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    <span>Isi Google Form Pengaduan</span>
                    <svg class="contact-btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 17l9.2-9.2M17 17V8H8"/>
                    </svg>
                </a>
            </div>
        </div> 

        <!-- KANAN -->
        <div class="contact-right">

            <h2>Hubungi Kami</h2>

            <ul class="contact-list">
                <li>
                    <span class="contact-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </span>
                    <p>(061) 6850613</p>
                </li>
                <li>
                    <span class="contact-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    </span>
                    <p>balaik3medan@gmail.com</p>
                </li>
                <li>
                    <span class="contact-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </span>
                    <p>Jl. KL. Yos Sudarso No.64, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242</p>
                </li>
            </ul>

            <div class="contact-map img-skeleton-wrap">
                <iframe
                    src="https://maps.google.com/maps?q=balai%20k3%20medan&t=&z=15&output=embed"
                    loading="lazy"
                    title="Peta Lokasi Balai K3 Medan">
                </iframe>
            </div>

        </div>

    </div>

</section>


@endsection
