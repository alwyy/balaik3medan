<style>
.services-detail-section {
    max-width: 1200px;
    margin: 40px auto 80px;
    padding: 0 20px;
}

.services-header {
    text-align: center;
    margin-bottom: 50px;
}

.services-header h1 {
    font-size: 34px;
    color: var(--color-primary, #09377D);
    font-weight: 700;
    margin-bottom: 12px;
    letter-spacing: -0.01em;
}

.services-header p {
    font-size: 16px;
    color: var(--color-text-muted, #64748b);
    max-width: 750px;
    margin: auto;
    line-height: 1.6;
}

.service-grid-detail {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 28px;
}

.service-item-card {
    background: #ffffff;
    border-radius: var(--radius-xl, 18px);
    padding: 34px 28px;
    border: 1px solid var(--color-border, #e2e8f0);
    box-shadow: var(--shadow-md, 0 4px 14px rgba(15, 23, 42, 0.06));
    border-top: 4px solid var(--color-primary, #09377D);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.25s ease;
}

.service-item-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover, 0 16px 36px rgba(0, 51, 102, 0.12));
    border-color: rgba(0, 51, 102, 0.25);
}

.service-icon-box {
    width: 58px;
    height: 58px;
    border-radius: var(--radius-lg, 14px);
    background: var(--color-surface-hover, #eef5fc);
    color: var(--color-primary, #09377D);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 20px;
    border: 1px solid var(--color-border, #e2e8f0);
    transition: transform 0.25s ease, background-color 0.25s ease;
}

.service-item-card:hover .service-icon-box {
    transform: scale(1.06);
    background: var(--color-primary, #09377D);
    color: #ffffff;
}

.service-item-card h3 {
    font-size: 20px;
    color: var(--color-primary, #09377D);
    margin-bottom: 14px;
    font-weight: 700;
}

.service-item-card p {
    font-size: 14.5px;
    color: var(--color-text-body, #334155);
    line-height: 1.7;
    margin-bottom: 14px;
}

.service-item-card ul {
    padding-left: 20px;
    font-size: 14px;
    color: var(--color-text-body, #334155);
}

.service-item-card li {
    margin-bottom: 8px;
    line-height: 1.5;
}

.cta-box {
    margin-top: 60px;
    background: var(--color-primary, #09377D);
    border-radius: var(--radius-xl, 18px);
    padding: 44px 36px;
    text-align: center;
    color: #ffffff;
    box-shadow: var(--shadow-lg, 0 10px 28px rgba(15, 23, 42, 0.08));
    position: relative;
    overflow: hidden;
}

.cta-box h2 {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 12px;
}

.cta-box p {
    font-size: 16px;
    opacity: 0.95;
    max-width: 650px;
    margin: 0 auto 26px;
    line-height: 1.6;
}

.cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #ffffff;
    color: var(--color-primary, #09377D);
    padding: 12px 28px;
    border-radius: var(--radius-md, 10px);
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.2s ease,
                background-color 0.2s ease;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
}

.cta-btn:hover {
    background: var(--color-surface-hover, #eef5fc);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
}

.cta-btn:active {
    transform: translateY(0) scale(0.98);
}
</style>

<div class="services-detail-section">

    <div class="services-header">
        <h1>Jenis Layanan K3</h1>
        <p>
            Balai Keselamatan dan Kesehatan Kerja (K3) Medan menyediakan berbagai layanan teknis
            pengujian, pemeriksaan kesehatan kerja, pelatihan, dan pembinaan keselamatan dan kesehatan kerja.
        </p>
    </div>

    <div class="service-grid-detail">

        <!-- CARD 1 -->
        <div class="service-item-card">
            <div class="service-icon-box">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 18h8"/>
                    <path d="M3 22h18"/>
                    <path d="M14 22a7 7 0 1 0 0-14h-1"/>
                    <path d="M9 14h2"/>
                    <path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"/>
                    <path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/>
                </svg>
            </div>
            <h3>1. Pengujian Faktor Fisik</h3>
            <p>Pengukuran parameter lingkungan kerja fisik guna memastikan tempat kerja memenuhi Nilai Ambang Batas (NAB):</p>
            <ul>
                <li>Pengukuran kebisingan dan pemetaan kebisingan (Noise Mapping)</li>
                <li>Pengukuran pencahayaan (Intensitas Penerangan)</li>
                <li>Pengukuran iklim kerja (ISBB / Panas)</li>
                <li>Pengukuran getaran (Vibrasi lengan-tangan &amp; seluruh tubuh)</li>
                <li>Pengukuran radiasi gelombang elektromagnetik</li>
            </ul>
        </div>

        <!-- CARD 2 -->
        <div class="service-item-card">
            <div class="service-icon-box">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 2v7.31L4.15 19.34A2 2 0 0 0 5.86 22h12.28a2 2 0 0 0 1.71-2.66L14 9.31V2"/>
                    <path d="M8.5 2h7"/>
                    <path d="M7 16h10"/>
                </svg>
            </div>
            <h3>2. Pengujian Faktor Kimia &amp; Udara</h3>
            <p>Analisis kandungan bahan berbahaya dan kualitas udara di lingkungan kerja:</p>
            <ul>
                <li>Pengujian debu total dan debu respirabel (Personal Dust Sampler)</li>
                <li>Pengujian gas-gas berbahaya (CO, CO2, SO2, NO2, H2S, NH3, dll.)</li>
                <li>Analisis uap senyawa organik mudah menguap (VOCs)</li>
                <li>Pengukuran kandungan logam berat di udara kerja</li>
            </ul>
        </div>

        <!-- CARD 3 -->
        <div class="service-item-card">
            <div class="service-icon-box">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3s-3 1.34-3 3v6c0 1.66 1.34 3 3 3z"/>
                    <path d="M5 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S2 3.34 2 5v6c0 1.66 1.34 3 3 3z"/>
                    <path d="M2 9h6"/>
                    <path d="M16 9h6"/>
                    <path d="M5 14v2a7 7 0 0 0 14 0v-2"/>
                    <path d="M12 21v1"/>
                </svg>
            </div>
            <h3>3. Pemeriksaan Kesehatan Kerja</h3>
            <p>Layanan medical check-up dan surveilans kesehatan tenaga kerja oleh dokter pemeriksa kesehatan kerja:</p>
            <ul>
                <li>Pemeriksaan kesehatan awal, berkala, dan khusus</li>
                <li>Audiometri (Pemeriksaan ketajaman pendengaran)</li>
                <li>Spirometri (Pemeriksaan fungsi paru)</li>
                <li>Pemeriksaan laboratorium biologi dan darah</li>
            </ul>
        </div>

        <!-- CARD 4 -->
        <div class="service-item-card">
            <div class="service-icon-box">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="7" r="4"/>
                    <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                    <path d="M16 11l2 2 4-4"/>
                </svg>
            </div>
            <h3>4. Pengujian Ergonomi &amp; Psikologi</h3>
            <p>Evaluasi kesesuaian stasiun kerja, postur kerja, dan beban kerja psikologis:</p>
            <ul>
                <li>Analisis postur kerja (metode REBA, RULA, OWAS)</li>
                <li>Pengukuran beban kerja fisik dan fisiologis</li>
                <li>Pemeriksaan kelelahan kerja (Reaction Timer)</li>
                <li>Evaluasi faktor psikososial tempat kerja</li>
            </ul>
        </div>

        <!-- CARD 5 -->
        <div class="service-item-card">
            <div class="service-icon-box">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
            </div>
            <h3>5. Pelatihan &amp; Peningkatan Kapasitas</h3>
            <p>Program bimbingan teknis, sosialisasi, dan pelatihan kompetensi personil K3:</p>
            <ul>
                <li>Bimbingan Teknis Audit Internal SMK3 (PP 50/2012)</li>
                <li>Pelatihan Higiene Industri dan Pengukuran K3</li>
                <li>Webinar nasional &amp; Sosialisasi K3 bagi industri</li>
                <li>Edukasi keselamatan kerja untuk mahasiswa dan masyarakat</li>
            </ul>
        </div>

        <!-- CARD 6 -->
        <div class="service-item-card">
            <div class="service-icon-box">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                    <path d="m9 14 2 2 4-4"/>
                </svg>
            </div>
            <h3>6. Konsultansi &amp; Pendampingan SMK3</h3>
            <p>Layanan konsultasi teknis pemenuhan regulasi dan norma keselamatan kerja:</p>
            <ul>
                <li>Pendampingan penerapan Sistem Manajemen K3</li>
                <li>Konsultasi pengendalian risiko bahaya di tempat kerja</li>
                <li>Penyusunan rekomendasi perbaikan lingkungan kerja</li>
            </ul>
        </div>

    </div>

    <!-- CTA -->
    <div class="cta-box">
        <h2>Butuh Layanan Pengujian atau Konsultasi K3?</h2>
        <p>Hubungi petugas layanan kami atau ajukan permohonan resmi pengujian dan pemeriksaan K3 sekarang.</p>
        <a href="<?= url('/#contact') ?>" class="cta-btn">Hubungi Kami</a>
    </div>

</div>

