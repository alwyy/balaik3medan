# Panduan Pengembangan CMS Balai K3 Medan
**Website Resmi Balai Keselamatan dan Kesehatan Kerja Medan**  
*Kementerian Ketenagakerjaan Republik Indonesia*  
*Ditujukan untuk: Tim Pengembang CMS / Web Administrator*

---

## 1. Ringkasan Arsitektur Sistem

Website Balai K3 Medan dibangun dengan arsitektur **PHP MVC (Model-View-Controller)** yang ringan, modular, cepat, dan **siap dihubungkan ke dashboard CMS (CMS-Ready)** tanpa dependensi pihak ketiga yang membebani server:

```text
balaik3medan/
├── assets/                  # Aset visual (logo resmi, ornamen K3, logo mitra)
├── config/                  # Konfigurasi aplikasi & integrasi API
│   ├── config.php           # Base URL, APP_ROOT, env helper
│   └── instagram.php        # Konfigurasi Meta/Instagram Graph API & caching
├── controllers/             # Controller halaman publik & CMS Admin
│   ├── CapaianKinerjaController.php  # Pengendali halaman Capaian Kinerja
│   ├── GaleriController.php          # Pengendali halaman Galeri Kegiatan
│   └── Admin/               # [Workspace CMS] Area controller CRUD Admin
├── core/                    # Engine inti MVC (App, Controller, Database)
├── data/                    # Penyimpanan data terstruktur (JSON Store)
│   ├── activities.json      # Sumber data 12 kegiatan galeri Instagram
│   ├── capaian_kinerja.json # Sumber data KPI, target, realisasi & mitra
│   └── instagram_cache.json # Cache respon API Meta (auto-generated)
├── database/                # Skema migrasi SQL (jika beralih ke MySQL)
│   └── schema_activities.sql
├── models/                  # Model data & service CMS
│   ├── CapaianKinerjaModel.php # Logika capaian kinerja & auto-fetch logo
│   └── InstagramModel.php      # Logika caching & sinkronisasi galeri
├── scripts/                 # CLI script automasi cron job
│   └── refresh_instagram.php
└── views/                   # Template tampilan frontend responsif
    ├── layouts/             # Header, footer, navigasi global
    └── public/              # Sub-halaman publik (capaian-kinerja, galeri, dll.)
```

---

## 2. Modul CMS 1: Sasaran Strategis & Capaian Kinerja

Halaman **Capaian Kinerja** (`/capaian-kinerja`) telah dirancang sepenuhnya dinamis. Admin CMS dapat memperbarui data berkala melalui antarmuka admin dengan mengonsumsi model yang telah disediakan.

### A. Komponen Data (`data/capaian_kinerja.json`)
Struktur data terdiri atas 5 entitas utama:
1. **`meta` & `ringkasan_eksekutif`**: Judul laporan, tahun anggaran, periode aktif (contoh: *Januari 2026*), dan narasi pembuka.
2. **`kpi_utama`**: 4 kartu metrik utama di bagian atas:
   - Realisasi PNBP (format Rupiah `Rp`, nilai numerik)
   - Perusahaan Terlayani
   - Peserta Edukasi K3
   - Kegiatan Sosialisasi Offline
3. **`sasaran_strategis`**: Matriks Perjanjian Kinerja Resmi:
   - Layanan Pengujian K3 (Target: 350 Badan Usaha)
   - Peningkatan Kapasitas K3 (Target: 300 Orang)
   - Pendampingan SMK3 (Target: 20 Obyek)
   - Dukungan Manajemen (Target: 1 Layanan)
   - Dilengkapi nilai `target`, `realisasi`, `persen`, dan `keterangan`.
4. **`sebaran_peserta_webinar`**: Rincian resmi peserta edukasi daring (Total 590 peserta lintas 5 kategori: Instansi Pemerintah, Masyarakat Umum, Perusahaan, Akademisi, Mahasiswa) yang otomatis menggerakkan diagram donat Chart.js dan bilah progres.
5. **`perusahaan_mitra`**: Daftar badan usaha yang telah memperoleh layanan teknis:
   - `id`, `nama`, `singkatan`, `domain`, `logo_custom`, `bidang`, `layanan`, `lokasi`, `periode`, `status`.

### B. Fitur Resolusi Logo Perusahaan Otomatis & Override Manual
Sistem dilengkapi logika pintar pada `CapaianKinerjaModel::resolveLogoUrl($company)`:
- **Prioritas 1 (Manual Override):** Jika admin mengisi `logo_custom` (misal path file `assets/logo_pamin.png` atau URL kustom), sistem langsung memakai logo tersebut. Fitur ini berguna jika logo yang ditarik dari internet salah atau ingin diganti logo resmi resolusi tinggi.
- **Prioritas 2 (Auto-Fetch Internet via Domain):** Jika `logo_custom` kosong, sistem otomatis mencari logo resmi perusahaan dari domain (`domain`, misal `prodia.co.id`, `hakaaston.co.id`) menggunakan Clearbit API dengan fallback bertingkat via Google Favicon Service dan Unavatar.
- **Prioritas 3 (Graceful Fallback Monogram):** Jika seluruh sumber internet tidak merespons, sistem otomatis menampilkan avatar inisial perusahaan elegan tanpa merusak tata letak kartu.
- **Efek Visual Interaktif:** Logo tampil monokrom (*grayscale 100%*) secara *default* dan berubah menjadi berwarna penuh (*grayscale 0%*) saat kursor diarahkan (*hover*).

### C. Panduan Backend CMS untuk Capaian Kinerja
Untuk membuat form edit di dashboard admin:
```php
require_once APP_ROOT . '/models/CapaianKinerjaModel.php';

// 1. Ambil data saat ini
$data = CapaianKinerjaModel::getData();

// 2. Modifikasi nilai dari form POST CMS Admin
$data['meta']['periode_laporan'] = $_POST['periode_laporan'];
$data['kpi_utama'][0]['nilai'] = (int)$_POST['pnbp_nilai'];
$data['kpi_utama'][0]['format'] = 'Rp ' . number_format($_POST['pnbp_nilai'], 0, ',', '.');

// 3. Simpan kembali (instan ter-update ke frontend)
CapaianKinerjaModel::saveData($data);
```

---

## 3. Modul CMS 2: Galeri Kegiatan & Integrasi Instagram

Halaman **Galeri Kegiatan** (`/galeri`) dan cuplikan galeri di Beranda menampilkan dokumentasi visual terbaru dari akun resmi `@balaik3medan`.

### A. Tiga Pilihan Sumber Data untuk Developer CMS:
1. **Opsi File-Based JSON (`data/activities.json` - Paling Direkomendasikan):**
   - Admin CMS mengunggah foto kegiatan via form CMS ke folder `uploads/activities/`.
   - Data otomatis disimpan melalui `InstagramModel::savePosts($posts)`.
   - Ringan, tanpa perlu database MySQL tambahan.
2. **Opsi Sinkronisasi Otomatis Instagram Graph API:**
   - Aktifkan `'api_enabled' => true` di `config/instagram.php`.
   - Masukkan Token Akses Resmi dari Meta for Developers.
   - Pasang Cron Job di server per 1 jam:
     ```cron
     0 * * * * /usr/bin/php /var/www/html/balaik3medan/scripts/refresh_instagram.php > /dev/null 2>&1
     ```
3. **Opsi Database Relasional MySQL:**
   - Import skema `database/schema_activities.sql`.
   - Integrasikan model ke query `SELECT * FROM activities WHERE is_published = 1`.

### B. Proteksi Rate Limiting Meta API (Penting)
Meta membatasi kuota panggilan maksimal **200 request/jam/user**. Sistem telah mengamankan ini dengan:
- **Cache Lokal (`cache_ttl` = 3600 detik / 1 jam):** Respon API disimpan ke `data/instagram_cache.json`. Pengunjung web dilayani 100% dari cache lokal berkecepatan 0ms.
- **Fail-Safe Fallback:** Jika kuota habis (HTTP 429) atau token kedaluwarsa, web otomatis menampilkan data lokal dari `data/activities.json` tanpa error.

---

## 4. Panduan Pembuatan Endpoint Admin CMS yang Direkomendasikan

Developer tim CMS disarankan membuat rute berikut di bawah namespace `Admin`:

| Rute / Endpoint | Method | Deskripsi Fungsi |
| :--- | :--- | :--- |
| `/admin/login` | GET/POST | Autentikasi pengelola/petugas humas |
| `/admin/dashboard` | GET | Ringkasan metrik website & status sinkronisasi |
| `/admin/capaian-kinerja` | GET/POST | Form pembaruan KPI, target tahunan & nilai realisasi |
| `/admin/perusahaan-mitra` | GET/POST | CRUD daftar perusahaan teruji & upload logo kustom |
| `/admin/galeri` | GET/POST | Manajemen 12 foto kegiatan dokumentasi K3 |
| `/admin/galeri/sync` | POST | Tombol manual pemicu sinkronisasi API Instagram |

---

## 5. Checklist Sebelum Push & Deploy ke Server (Pre-Push Checklist)

Sebelum melakukan `git push` atau migrasi ke server hosting/VPS produksi:

1. **Hak Akses Tulis Direktori (File Permissions):**
   Pastikan folder berikut memiliki izin tulis (`chmod 755` atau `775` di Linux):
   - `data/` (penulisan `activities.json`, `capaian_kinerja.json`, dan cache)
   - `uploads/` (penyimpanan gambar baru yang diunggah via CMS)
2. **Pengamanan Token Meta / API:**
   - Jangan menuliskan token permanen pada berkas publik. Gunakan berkas `.env` atau *environment variable* server:
     ```env
     INSTAGRAM_ACCESS_TOKEN="EAAxxxxxxx..."
     INSTAGRAM_USER_ID="178414xxxxxxx..."
     ```
3. **Penyelarasan Skema Warna Resmi:**
   - Seluruh komponen baru harus mematuhi skema warna **Deep Navy `#09377D`** dan **Slate `#334155` / `#64748b`**.
   - Hindari warna variatif pelangi (*rainbow palette*) untuk menjaga citra formal kementerian/pemerintah.
4. **Verifikasi Script CLI:**
   - Uji coba skrip sinkronisasi melalui terminal:
     ```bash
     php scripts/refresh_instagram.php
     ```

---
*Dokumentasi ini disusun sebagai acuan teknis standar bagi seluruh pengembang kelanjutan sistem Balai K3 Medan.*
