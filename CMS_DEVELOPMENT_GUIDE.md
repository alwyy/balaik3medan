# Panduan Pengembangan CMS & Integrasi Instagram API
**Website Resmi Balai Keselamatan dan Kesehatan Kerja Medan**  
*Ditujukan untuk: Tim / Developer Pengembang CMS (Jobdesk CMS)*

---

## 1. Ringkasan Arsitektur
Website ini dibangun menggunakan arsitektur **PHP MVC (Model-View-Controller)** yang ringan, cepat, dan modular tanpa dependency berat:
* `config/` : Konfigurasi aplikasi (`config.php`) dan pengaturan Instagram API (`instagram.php`).
* `models/` : Model logika data, termasuk `InstagramModel.php` untuk suplai postingan kegiatan ke Beranda & Galeri.
* `controllers/` : Controller halaman publik dan folder `controllers/Admin/` (area kerja tim CMS).
* `views/` : Tampilan frontend responsif (`views/public/home/` dan `views/public/galeri/`).
* `data/` : Penyimpanan data lokal (`activities.json` dan `instagram_cache.json`).
* `database/` : Skema SQL siap pakai (`schema_activities.sql`) jika ingin migrasi ke MySQL.
* `scripts/` : Script CLI automasi (`refresh_instagram.php`) untuk cron sync.

---

## 2. Setting Penting Sebelum Push & Deploy (Pre-Push Checklist)

Sebelum melakukan `git push` atau deploy ke server staging/production, perhatikan checklist berikut:

### A. Pengamanan Kredensial & Token API
1. **Jangan hardcode `access_token`** rahasia di dalam file publik. Gunakan Environment Variable atau file `.env`:
   ```bash
   # Di server / hosting / file .env:
   INSTAGRAM_ACCESS_TOKEN="EAAxxxxxxx..."
   INSTAGRAM_USER_ID="178414xxxxxxx..."
   ```
2. File `config/instagram.php` sudah disiapkan membaca `getenv('INSTAGRAM_ACCESS_TOKEN')`.

### B. Pengaturan Pembatasan API (Rate Limiting Meta/Instagram)
> [!IMPORTANT]
> Meta / Instagram Graph API membatasi panggilan maksimal **200 request per jam per user**. Jika setiap pengunjung memicu request API langsung, kuota akan habis dalam hitungan menit dan memicu error `HTTP 429 Too Many Requests`.

* **Solusi yang telah kami pasang:**
  * **Mekanisme Cache Lokal (`cache_ttl`):** Default disetel ke `3600` detik (1 jam). Selama cache valid, web **TIDAK AKAN** menghubungi server Meta, menjaga performa tetap instan (0ms latency API).
  * **Proteksi Rate Limit Safety (`rate_limit_safety`):** Jika token kedaluwarsa atau kena limit HTTP 429, sistem otomatis fallback ke data lokal `data/activities.json` tanpa membuat website error/blank.
* **Durasi Token Meta:** Long-lived User Access Token Meta berlaku **60 hari**. Developer CMS disarankan membuat endpoint refresh token otomatis (`GET /refresh_access_token`) sebelum masa aktifnya berakhir.

### C. Izin Tulis Direktori (File Permissions)
Pastikan folder berikut memiliki permission write di server (Linux: `chmod 755` atau `775`):
* `data/` (untuk penulisan cache dan file `activities.json`)
* `uploads/` (untuk upload gambar banner / media baru via CMS)

---

## 3. Pilihan Implementasi CMS untuk Developer

Developer CMS dapat memilih salah satu dari 3 metode pengembangan di bawah ini:

### Opsi 1: File-Based CMS (Paling Cepat & Ringan)
Tidak memerlukan setup database. Cukup buat dashboard admin di `controllers/Admin/ActivityController.php` dengan fitur form input:
```php
require_once APP_ROOT . '/models/InstagramModel.php';

// Menambah / Update postingan:
$posts = InstagramModel::getLatestPosts(12);
// Tambahkan data baru ke array $posts...
InstagramModel::savePosts($posts); // Otomatis tersimpan ke data/activities.json
```
Frontend Beranda dan Galeri otomatis langsung menampilkan data terbaru tersebut.

### Opsi 2: Database MySQL CMS
Jika tim CMS ingin menggunakan database relasional:
1. Import file `database/schema_activities.sql` ke database MySQL Anda.
2. Di `models/InstagramModel.php`, arahkan method `getFallbackPosts()` untuk menjalankan query:
   ```php
   $db = Database::getInstance()->getConnection();
   $stmt = $db->query("SELECT * FROM activities WHERE is_published = 1 ORDER BY sort_order ASC, id DESC LIMIT 12");
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
   ```

### Opsi 3: Integrasi Otomatis Instagram Graph API
Jika ingin web otomatis menarik postingan langsung dari akun `@balaik3medan`:
1. Buka `config/instagram.php`.
2. Ubah `'api_enabled' => true`.
3. Masukkan `access_token` dari Meta for Developers (Instagram Basic Display / Graph API).
4. Buat Cron Job di cPanel / Linux server setiap 1 jam sekali:
   ```cron
   0 * * * * /usr/bin/php /var/www/html/balaik3medan/scripts/refresh_instagram.php > /dev/null 2>&1
   ```

---

## 4. Struktur Format Data Postingan (12 Terbaru)

Frontend Beranda (`views/public/home/index.php`) dan Galeri (`views/public/galeri/index.php`) mengharapkan format objek/array berikut:

| Field | Tipe | Keterangan | Contoh |
| :--- | :--- | :--- | :--- |
| `id` | int/string | ID unik postingan | `1` |
| `image` | string | URL gambar atau path file lokal | `assets/activities/post_1.jpg` |
| `tag` | string | Kategori / badge kartu | `Uji Lingkungan`, `Bimtek`, `Edukasi K3` |
| `title` | string | Judul kegiatan | `Pengujian K3 Faktor Fisika & Kimia` |
| `caption`| string | Ringkasan isi postingan | `Pelaksanaan pengujian lingkungan kerja...` |
| `date` | string | Tanggal publikasi relatif / absolut | `1 hari yang lalu` atau `20 Nov 2026` |
| `url` | string | Link langsung ke postingan IG | `https://www.instagram.com/balaik3medan` |

---

## 5. Testing & Verifikasi
Untuk mengetes kesiapan sistem sinkronisasi kapan saja melalui terminal:
```bash
php scripts/refresh_instagram.php
```
Script akan mencetak status API, status cache, serta 12 postingan kegiatan terkini yang siap ditampilkan.
