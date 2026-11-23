<style>
.tugas-wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 50px 20px 70px;
}

.top-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
    margin-bottom: 60px;
}

.top-card {
    background: #ffffff;
    border-radius: var(--radius-xl, 18px);
    overflow: hidden;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-md, 0 4px 14px rgba(15, 23, 42, 0.06));
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.25s ease;
    display: flex;
    flex-direction: column;
}

.top-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover, 0 16px 36px rgba(0, 51, 102, 0.12));
    border-color: rgba(0, 51, 102, 0.25);
}

.top-card .top-card-media {
    height: 220px;
    overflow: hidden;
    position: relative;
    background: #e2e8f0;
}

.top-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.35s ease;
}

.top-card:hover img {
    transform: scale(1.025);
}

.top-card p {
    padding: 18px 20px;
    font-weight: 600;
    text-align: center;
    color: var(--color-primary, #003366);
    margin: 0;
    font-size: 14.5px;
    line-height: 1.5;
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.page-title {
    text-align: center;
    font-size: 34px;
    color: var(--color-primary, #003366);
    margin-bottom: 50px;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.page-title::after {
    content: "";
    width: 70px;
    height: 3px;
    background: var(--color-primary, #003366);
    display: block;
    margin: 14px auto 0;
    border-radius: 2px;
}

.content-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: start;
}

.image-frame {
    background: #ffffff;
    padding: 18px;
    border-radius: var(--radius-xl, 20px);
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-md, 0 4px 14px rgba(15, 23, 42, 0.06));
}

.image-grid {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.image-grid-item {
    width: 100%;
    aspect-ratio: 1080 / 640;
    border-radius: var(--radius-lg, 14px);
    overflow: hidden;
    position: relative;
    background: #e2e8f0;
}

.image-grid img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.35s ease;
}

.image-grid-item:hover img {
    transform: scale(1.025);
}

.text-content {
    background: #ffffff;
    padding: 38px 36px;
    border-radius: var(--radius-xl, 18px);
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-md);
}

.text-content h2 {
    font-size: 22px;
    color: var(--color-primary, #003366);
    margin-bottom: 14px;
    border-bottom: 2px solid var(--color-primary, #003366);
    display: inline-block;
    padding-bottom: 4px;
    font-weight: 700;
}

.text-content p {
    color: var(--color-text-body, #334155);
    margin-bottom: 14px;
    line-height: 1.7;
    font-size: 15px;
}

.text-content ul {
    padding-left: 20px;
    margin-bottom: 26px;
}

.text-content li {
    margin-bottom: 8px;
    color: var(--color-text-body, #334155);
    line-height: 1.6;
    font-size: 14.5px;
}

.page-footer-note {
    text-align: center;
    margin-top: 50px;
    font-size: 14px;
    color: var(--color-text-muted, #64748b);
}

@media (max-width: 900px) {
    .content-wrapper {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .top-cards {
        grid-template-columns: 1fr;
    }
    .page-title {
        font-size: 28px;
    }
}
</style>

<div class="tugas-wrapper">

    <div class="top-cards">
        <div class="top-card">
            <div class="top-card-media img-skeleton-wrap">
                <img src="<?= asset('assets/bimbingan teknis.jpg') ?>" alt="Bimbingan Teknis" loading="lazy">
            </div>
            <p>Bimbingan teknis Audit Internal SMK3</p>
        </div>
        <div class="top-card">
            <div class="top-card-media img-skeleton-wrap">
                <img src="<?= asset('assets/field trip.jpg') ?>" alt="Field Trip" loading="lazy">
            </div>
            <p>Field Trip Mahasiswa/I Universitas Efarina</p>
        </div>
        <div class="top-card">
            <div class="top-card-media img-skeleton-wrap">
                <img src="<?= asset('assets/pengujian lingkungan kerja.jpg') ?>" alt="Pengujian K3" loading="lazy">
            </div>
            <p>Pengujian K3 Lingkungan Kerja</p>
        </div>
    </div>

    <h1 class="page-title">Tugas dan Fungsi Balai K3</h1>

    <div class="content-wrapper">

        <div class="image-frame">
            <div class="image-grid">
                <div class="image-grid-item img-skeleton-wrap">
                    <img src="<?= asset('assets/kegiatan k3.jpeg') ?>" alt="Kegiatan K3" loading="lazy">
                </div>
                <div class="image-grid-item img-skeleton-wrap">
                    <img src="<?= asset('assets/galeri8.jpeg') ?>" alt="Dokumentasi K3" loading="lazy">
                </div>
            </div>
        </div>

        <div class="text-content">
            <h2>Tugas</h2>
            <p>Sesuai Pasal 45 Permenaker Nomor 1 Tahun 2022, Balai K3 Medan mempunyai tugas melaksanakan:</p>

            <ul>
                <li>Pengujian keselamatan dan kesehatan kerja</li>
                <li>Peningkatan kapasitas dan uji kompetensi personil K3</li>
                <li>Pemeriksaan kesehatan kerja</li>
                <li>Pelayanan konsultasi K3</li>
                <li>Peningkatan jejaring K3</li>
            </ul>

            <h2>Fungsi</h2>
            <div class="fungsi-wrapper">
                <ul>
                    <li>Penyusunan rencana dan program</li>
                    <li>Analisis dan pengujian K3</li>
                    <li>Peningkatan kapasitas personil K3</li>
                    <li>Pemeriksaan kesehatan kerja</li>
                    <li>Konsultasi dan rekomendasi K3</li>
                    <li>Pengelolaan administrasi perkantoran</li>
                    <li>Evaluasi dan pelaporan berkala</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="page-footer-note">
        © 2026 Balai Keselamatan dan Kesehatan Kerja Medan — Kemnaker RI
    </div>

</div>
