<style>
.jadwal-page-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 24px 20px 60px;
    background: var(--color-bg, #f8fafc);
    position: relative;
    overflow: hidden;
    min-height: calc(100vh - 180px);
}

/* DEKORASI LINE ABSTRACT (KIRI ATAS & KANAN BAWAH - ASIMETRIS / MONOCHROME) */
.abstract-line-decor {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    user-select: none;
    opacity: 0.16;
    transition: opacity 0.3s ease;
}

.abstract-line-decor.decor-top-left {
    top: -50px;
    left: -70px;
    width: 440px;
    max-width: 38vw;
    height: auto;
    transform: rotate(-12deg);
}

.abstract-line-decor.decor-bottom-right {
    bottom: -60px;
    right: -80px;
    width: 500px;
    max-width: 42vw;
    height: auto;
    transform: rotate(168deg) scaleX(-1);
}

.abstract-line-img {
    width: 100%;
    height: auto;
    display: block;
}

.jadwal-frame {
    position: relative;
    z-index: 2;
    background: #ffffff;
    width: 100%;
    max-width: 580px;
    padding: 40px 42px;
    border-radius: var(--radius-xl, 18px);
    box-shadow: 0 10px 32px rgba(15, 23, 42, 0.07);
    text-align: center;
    border: 1px solid var(--color-border, #e2e8f0);
    border-top: 5px solid var(--color-primary, #09377D);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.25s ease;
}

.jadwal-frame:hover {
    transform: translateY(-2px);
    box-shadow: 0 18px 40px rgba(9, 55, 125, 0.12);
    border-color: var(--color-border-hover, #cbd5e1);
}

.logo-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 32px;
    margin-bottom: 24px;
}

.logo-container img {
    height: 52px;
    width: auto;
    object-fit: contain;
    transition: transform 0.25s ease;
}

.logo-container img.logo-center-mark {
    height: 74px;
}

.logo-container img:hover {
    transform: scale(1.05);
}

.header-title {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: var(--color-primary, #09377D);
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.sub-title {
    font-size: 13.5px;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 22px;
    color: var(--color-primary-light, #124b9e);
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.sub-title span {
    display: block;
}

.main-title {
    font-size: 24px;
    font-weight: 800;
    margin: 20px 0 24px;
    letter-spacing: -0.01em;
    color: var(--color-primary, #09377D);
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.jadwal-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 14.5px;
    border-radius: var(--radius-md, 10px);
    overflow: hidden;
    border: 1px solid var(--color-border, #e2e8f0);
}

.jadwal-table th {
    background: var(--color-primary, #09377D);
    color: #ffffff;
    padding: 13px 16px;
    font-weight: 600;
    font-size: 14px;
    text-align: left;
    font-family: var(--font-title, 'Montserrat', sans-serif);
}

.jadwal-table th:last-child {
    text-align: right;
}

.jadwal-table td {
    padding: 12px 16px;
    border-bottom: 1px solid var(--color-border, #e2e8f0);
    color: var(--color-text-body, #334155);
    text-align: left;
    transition: background-color 0.15s ease;
}

.jadwal-table td:last-child {
    text-align: right;
    font-variant-numeric: tabular-nums;
}

.jadwal-table tr:hover td {
    background-color: var(--color-surface-hover, #f1f5f9);
}

.jadwal-table tr:last-child td {
    border-bottom: none;
}

.badge-libur {
    display: inline-block;
    padding: 3px 10px;
    border-radius: var(--radius-full, 9999px);
    background: #fef2f2;
    color: #dc2626;
    font-weight: 600;
    font-size: 13px;
    border: 1px solid #fee2e2;
}

.jadwal-footer {
    margin-top: 32px;
    font-size: 13.5px;
    color: var(--color-text-muted, #64748b);
    line-height: 1.6;
}

@media (max-width: 992px) {
    .abstract-line-decor {
        opacity: 0.12;
    }
    .abstract-line-decor.decor-top-left {
        top: -60px;
        left: -80px;
        width: 320px;
    }
    .abstract-line-decor.decor-bottom-right {
        bottom: -70px;
        right: -90px;
        width: 360px;
    }
}

@media (max-width: 680px) {
    .abstract-line-decor {
        opacity: 0.08;
    }
    .abstract-line-decor.decor-top-left {
        top: -70px;
        left: -90px;
        width: 240px;
    }
    .abstract-line-decor.decor-bottom-right {
        bottom: -70px;
        right: -90px;
        width: 260px;
    }
    .jadwal-frame {
        padding: 30px 20px;
    }
    .logo-container {
        gap: 18px;
    }
    .logo-container img {
        height: 44px;
    }
}
</style>

<div class="jadwal-page-wrapper">

    <!-- DEKORASI LINE ABSTRACT KIRI ATAS -->
    <div class="abstract-line-decor decor-top-left" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="abstract-line-img">
    </div>

    <!-- DEKORASI LINE ABSTRACT KANAN BAWAH -->
    <div class="abstract-line-decor decor-bottom-right" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="abstract-line-img">
    </div>

    <!-- KARTU JADWAL -->
    <div class="jadwal-frame">

        <div class="logo-container">
            <img src="<?= asset('assets/binwasnaker.png') ?>" alt="Binwasnaker">
            <img src="<?= asset('assets/kemnaker_mark.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker_mark.png') ?>" alt="Kemnaker" class="logo-center-mark">
            <img src="<?= asset('assets/penguji k3.png') ?>" alt="Penguji K3">
        </div>

        <div class="header-title">KEMENTERIAN KETENAGAKERJAAN</div>
        <div class="sub-title">
            <span>BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN</span>
        </div>

        <div class="main-title">JADWAL PELAYANAN</div>

        <table class="jadwal-table">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Pelayanan</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Senin</td><td>07.30 - 16.00 WIB</td></tr>
                <tr><td>Selasa</td><td>07.30 - 16.00 WIB</td></tr>
                <tr><td>Rabu</td><td>07.30 - 16.00 WIB</td></tr>
                <tr><td>Kamis</td><td>07.30 - 16.00 WIB</td></tr>
                <tr><td>Jumat</td><td>07.30 - 16.30 WIB</td></tr>
                <tr><td>Sabtu</td><td><span class="badge-libur">Libur</span></td></tr>
                <tr><td>Minggu</td><td><span class="badge-libur">Libur</span></td></tr>
            </tbody>
        </table>

        <div class="jadwal-footer">
            Medan, 2026<br>
            <strong>Kepala Balai K3 Medan</strong>
        </div>

    </div>
</div>

