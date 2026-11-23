-- =====================================================================
-- Schema Database untuk Modul CMS Kegiatan & Instagram Balai K3 Medan
-- Table: activities
-- =====================================================================

CREATE TABLE IF NOT EXISTS `activities` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `instagram_media_id` VARCHAR(100) NULL COMMENT 'ID Postingan dari Instagram Graph API',
    `tag` VARCHAR(50) NOT NULL DEFAULT 'Kegiatan K3' COMMENT 'Kategori/Badge kegiatan',
    `title` VARCHAR(255) NOT NULL COMMENT 'Judul Postingan / Kegiatan',
    `caption` TEXT NOT NULL COMMENT 'Deskripsi/Caption lengkap',
    `image` VARCHAR(255) NOT NULL COMMENT 'Path file lokal atau URL gambar Instagram',
    `url` VARCHAR(255) NOT NULL COMMENT 'Link ke postingan Instagram resmi',
    `post_date` VARCHAR(50) NULL COMMENT 'Waktu posting, misal: 2 hari yang lalu / 2026-11-20',
    `is_published` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'Status tampil di web (1: aktif, 0: draft)',
    `sort_order` INT NOT NULL DEFAULT 0 COMMENT 'Urutan tampilan prioritas',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_published_order` (`is_published`, `sort_order`, `id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================================
-- Data Awal (12 Postingan Terbaru Balai K3 Medan)
-- =====================================================================
INSERT INTO `activities` (`tag`, `title`, `caption`, `image`, `url`, `post_date`, `is_published`, `sort_order`) VALUES
('Uji Lingkungan', 'Pengujian K3 Faktor Fisika & Kimia', 'Pelaksanaan pengujian lingkungan kerja di area industri guna memastikan kepatuhan standar keselamatan kerja.', 'assets/activities/post_1.jpg', 'https://www.instagram.com/balaik3medan', '1 hari yang lalu', 1, 1),
('Bimbingan Teknis', 'Bimtek Penerapan SMK3', 'Peningkatan kompetensi personel K3 perusahaan melalui bimbingan teknis audit internal sistem manajemen K3.', 'assets/activities/post_2.jpg', 'https://www.instagram.com/balaik3medan', '3 hari yang lalu', 1, 2),
('Edukasi K3', 'Sosialisasi Budaya Keselamatan', 'Penyebarluasan budaya K3 ke institusi pendidikan dan pelaku industri di wilayah kerja Balai K3 Medan.', 'assets/activities/post_3.jpg', 'https://www.instagram.com/balaik3medan', '5 hari yang lalu', 1, 3),
('Pelayanan Teknis', 'Pemeriksaan Kesehatan Kerja', 'Pelayanan pemeriksaan kesehatan berkala bagi tenaga kerja untuk deteksi dini pencegahan penyakit akibat kerja.', 'assets/activities/post_4.jpg', 'https://www.instagram.com/balaik3medan', '1 minggu yang lalu', 1, 4),
('Laboratorium', 'Analisis Sampel Uji Laboratorium', 'Pengujian presisi sampel debu, gas kimia, dan kebisingan menggunakan peralatan laboratorium terkalibrasi.', 'assets/activities/post_5.jpg', 'https://www.instagram.com/balaik3medan', '1 minggu yang lalu', 1, 5),
('Kunjungan Studi', 'Field Trip Edukasi K3', 'Penerimaan kunjungan studi mahasiswa/i teknik dan kesehatan masyarakat mengenal instrumentasi pengujian K3.', 'assets/activities/post_6.jpg', 'https://www.instagram.com/balaik3medan', '2 minggu yang lalu', 1, 6),
('Reels Kegiatan', 'Dokumentasi Lapangan Balai K3', 'Sorotan aksi tim penguji K3 Balai K3 Medan saat menjalankan pengukuran parameter K3 di lapangan industri.', 'assets/activities/post_7.jpg', 'https://www.instagram.com/balaik3medan', '2 minggu yang lalu', 1, 7),
('Konsultasi K3', 'Layanan Konsultasi Norma K3', 'Pendampingan teknis dan konsultasi pemenuhan syarat K3 bagi perusahaan mitra di wilayah Pulau Sumatera.', 'assets/activities/post_8.jpg', 'https://www.instagram.com/balaik3medan', '3 minggu yang lalu', 1, 8),
('Koordinasi', 'Rapat Koordinasi Pengawasan K3', 'Sinergi pembinaan pengawasan ketenagakerjaan dan K3 bersama dinas tenaga kerja provinsi se-Sumatera.', 'assets/activities/post_9.jpg', 'https://www.instagram.com/balaik3medan', '3 minggu yang lalu', 1, 9),
('Bulan K3', 'Peringatan Bulan K3 Nasional', 'Rangkaian peringatan Bulan K3 Nasional mengusung budaya keselamatan kerja menuju Indonesia maju dan produktif.', 'assets/activities/post_10.jpg', 'https://www.instagram.com/balaik3medan', '1 bulan yang lalu', 1, 10),
('Pameran K3', 'Pameran Alat Uji & Instrumentasi K3', 'Sosialisasi dan pameran teknologi instrumentasi pengujian lingkungan kerja serta pemeriksaan kesehatan tenaga kerja.', 'assets/activities/post_11.jpg', 'https://www.instagram.com/balaik3medan', '1 bulan yang lalu', 1, 11),
('Sertifikasi SMK3', 'Sosialisasi Penerapan Sistem Manajemen K3', 'Pembinaan penerapan Sistem Manajemen Keselamatan dan Kesehatan Kerja (SMK3) di lingkungan sektor industri manufaktur.', 'assets/activities/post_12.jpg', 'https://www.instagram.com/balaik3medan', '2 bulan yang lalu', 1, 12);
