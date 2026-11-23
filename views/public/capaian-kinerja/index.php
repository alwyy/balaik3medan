<style>
.capaian-wrapper {
    max-width: 1050px;
    margin: 40px auto 70px;
    background: #ffffff;
    padding: 44px 48px;
    border-radius: var(--radius-xl, 18px);
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-md, 0 4px 14px rgba(15, 23, 42, 0.06));
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.capaian-wrapper:hover {
    box-shadow: var(--shadow-hover, 0 16px 36px rgba(0, 51, 102, 0.12));
}

.title {
    text-align: center;
    font-size: 26px;
    font-weight: 700;
    color: var(--color-primary, #003366);
    margin-bottom: 25px;
    position: relative;
    line-height: 1.4;
    letter-spacing: -0.01em;
}

.title:after {
    content: "";
    width: 60px;
    height: 3px;
    background: var(--color-primary, #003366);
    display: block;
    margin: 12px auto 0;
    border-radius: 2px;
}

.capaian-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 25px;
    font-size: 14.5px;
    border-radius: var(--radius-md, 10px);
    overflow: hidden;
    border: 1px solid var(--color-border, #e2e8f0);
}

.capaian-table th {
    background: var(--color-primary, #003366);
    color: #fff;
    padding: 13px;
    text-align: center;
    font-weight: 600;
}

.capaian-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--color-border, #e2e8f0);
    vertical-align: top;
    color: var(--color-text-body, #334155);
    transition: background-color 0.15s ease;
}

.capaian-table tr:hover td {
    background: var(--color-surface-hover, #eef5fc);
}

.capaian-table td:nth-child(1) {
    text-align: center;
    width: 50px;
    font-weight: 600;
}

.capaian-table td:nth-child(4) {
    text-align: center;
    font-weight: 600;
    color: var(--color-primary, #003366);
}

.indikator-list {
    margin: 0;
    padding-left: 20px;
}

.indikator-list li {
    margin-bottom: 8px;
    line-height: 1.5;
}

.capaian-section {
    margin-top: 40px;
    padding: 32px;
    background: var(--color-bg, #f8fafc);
    border-radius: var(--radius-lg, 14px);
    border: 1px solid var(--color-border, #e2e8f0);
    border-left: 5px solid var(--color-primary, #003366);
}

.section-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--color-primary, #003366);
    margin-bottom: 15px;
}

.sub-section {
    margin-top: 25px;
    font-size: 17px;
    color: var(--color-primary, #003366);
    font-weight: 700;
}

.capaian-section p {
    font-size: 14.5px;
    line-height: 1.8;
    color: var(--color-text-body, #334155);
    margin-bottom: 12px;
}

.highlight-box {
    background: #ffffff;
    padding: 22px 26px;
    margin: 20px 0;
    border-radius: var(--radius-md, 10px);
    box-shadow: var(--shadow-sm);
    font-size: 15px;
    border: 1px solid var(--color-border, #e2e8f0);
    border-left: 4px solid var(--color-accent, #0284c7);
}

.company-list {
    margin-top: 10px;
    padding-left: 20px;
    margin-bottom: 20px;
}

.company-list li {
    margin-bottom: 6px;
    font-weight: 500;
    color: var(--color-primary, #003366);
}

.stats-container {
    display: flex;
    gap: 16px;
    margin: 25px 0;
    flex-wrap: wrap;
}

.stat-card {
    flex: 1;
    min-width: 180px;
    background: #ffffff;
    padding: 24px 20px;
    border-radius: var(--radius-lg, 14px);
    text-align: center;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-sm);
    border-top: 4px solid var(--color-primary, #003366);
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.25s ease;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover);
}

.stat-number {
    font-size: 32px;
    font-weight: 800;
    color: var(--color-primary, #003366);
    letter-spacing: -0.02em;
}

.stat-label {
    font-size: 13.5px;
    margin-top: 8px;
    color: var(--color-text-muted, #64748b);
    font-weight: 500;
}

.rincian-title {
    font-weight: 700;
    margin-top: 25px;
    color: var(--color-primary, #003366);
    font-size: 16px;
}

.peserta-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 12px;
    margin-top: 15px;
}

.peserta-box {
    background: #ffffff;
    padding: 16px 12px;
    border-radius: var(--radius-md, 10px);
    text-align: center;
    font-size: 13.5px;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-sm);
    transition: transform 0.2s ease, border-color 0.2s ease;
}

.peserta-box:hover {
    transform: translateY(-2px);
    border-color: var(--color-primary-light, #15436d);
}

.peserta-box strong {
    font-size: 22px;
    color: var(--color-primary, #003366);
    display: block;
    margin-bottom: 4px;
    font-weight: 800;
}

@media (max-width: 768px) {
    .capaian-wrapper {
        padding: 28px 18px;
        margin: 20px 10px 50px;
    }
    .title {
        font-size: 20px;
    }
    .stats-container {
        flex-direction: column;
    }
}
</style>

<div class="capaian-wrapper">

    <div class="title">
        Sasaran Strategis dan Indikator Kinerja<br>
        Balai K3 Medan Tahun 2026
    </div>

    <table class="capaian-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Sasaran Kinerja</th>
                <th>Indikator Kinerja Kegiatan</th>
                <th>Target</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>Terlaksananya Pelayanan Pengujian K3</strong></td>
                <td>
                    <ul class="indikator-list">
                        <li>Jumlah obyek K3 yang mendapatkan layanan pengujian K3</li>
                        <li>Jumlah tenaga kerja yang ditingkatkan kapasitasnya atau memperoleh pembinaan K3</li>
                        <li>Jumlah obyek K3 yang mendapatkan pendampingan SMK3</li>
                    </ul>
                </td>
                <td>
                    350 Badan Usaha<br><br>
                    300 Orang<br><br>
                    20 Obyek
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td><strong>Terlaksananya Dukungan Manajemen Ditjen Binwasnaker dan K3</strong></td>
                <td>Layanan Dukungan Manajemen Internal</td>
                <td>1 Layanan</td>
            </tr>
        </tbody>
    </table>

    <div class="capaian-section">

        <h3 class="section-title">Gambaran Umum Capaian Kerja Januari 2026</h3>

        <p>
            Pada bulan Januari 2026, Balai K3 Medan melaksanakan berbagai kegiatan pengujian,
            pemeriksaan, dan pembinaan keselamatan dan kesehatan kerja sebagai bagian dari
            pelaksanaan tugas sesuai Permenaker Nomor 1 Tahun 2022.
        </p>

        <p>
            Pelaksanaan kegiatan difokuskan pada peningkatan kepatuhan norma K3,
            penguatan kapasitas pemangku kepentingan, serta peningkatan kualitas
            pelayanan publik di wilayah kerja Sumatera bagian utara.
        </p>

        <h4 class="sub-section">Capaian Layanan Pengujian K3</h4>

        <div class="highlight-box">
            Selama bulan Januari 2026, Balai K3 Medan telah melaksanakan pengujian dan 
            pemeriksaan K3 pada <strong>4 (empat) perusahaan</strong> dengan total realisasi 
            Penerimaan Negara Bukan Pajak (PNBP) sebesar:
            <br><br>
            <span style="font-size: 20px; color: #15436d; font-weight: 800;">Rp 35.870.000</span>
        </div>

        <p><strong>Perusahaan yang memperoleh layanan pengujian:</strong></p>

        <ul class="company-list">
            <li>PT Pacific Medan Industri</li>
            <li>PT Prodia Widyahusada Tbk</li>
            <li>PT Soeloeng Laoet Kebun Sinah Kasih</li>
            <li>PT Hakaaston</li>
        </ul>

        <p>
            Layanan pengujian tersebut merupakan bagian dari upaya pengendalian risiko kerja
            dan peningkatan kepatuhan terhadap norma keselamatan dan kesehatan kerja.
        </p>

        <h4 class="sub-section">Kegiatan Sosialisasi dan Edukasi K3</h4>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">16</div>
                <div class="stat-label">Kegiatan Sosialisasi Offline</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Webinar Nasional – Toolbox Meeting</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">590</div>
                <div class="stat-label">Peserta Daring</div>
            </div>
        </div>

        <div class="rincian-title">Rincian Peserta Webinar Nasional:</div>

        <div class="peserta-grid">
            <div class="peserta-box"><strong>361</strong>Instansi Pemerintah</div>
            <div class="peserta-box"><strong>81</strong>Perusahaan</div>
            <div class="peserta-box"><strong>117</strong>Masyarakat Umum</div>
            <div class="peserta-box"><strong>20</strong>Akademisi</div>
            <div class="peserta-box"><strong>11</strong>Mahasiswa</div>
        </div>

    </div>

</div>
