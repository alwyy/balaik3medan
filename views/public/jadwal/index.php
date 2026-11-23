<style>
.jadwal-page-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px 80px;
    background: var(--color-bg, #f8fafc);
}

.jadwal-frame {
    background: #ffffff;
    width: 100%;
    max-width: 580px;
    padding: 40px 42px;
    border-radius: var(--radius-xl, 18px);
    box-shadow: var(--shadow-md, 0 4px 14px rgba(15, 23, 42, 0.06));
    text-align: center;
    border: 1px solid var(--color-border, #e2e8f0);
    border-top: 5px solid var(--color-primary, #003366);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.25s ease;
}

.jadwal-frame:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover, 0 16px 36px rgba(0, 51, 102, 0.12));
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

.logo-container img:hover {
    transform: scale(1.05);
}

.header-title {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: var(--color-primary, #003366);
}

.sub-title {
    font-size: 13.5px;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 22px;
    color: var(--color-primary-light, #15436d);
}

.sub-title span {
    display: block;
}

.main-title {
    font-size: 24px;
    font-weight: 700;
    margin: 20px 0 24px;
    letter-spacing: -0.01em;
    color: var(--color-text-main, #0f172a);
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
    background: var(--color-primary, #003366);
    color: #ffffff;
    padding: 13px 16px;
    font-weight: 600;
    font-size: 14px;
    text-align: left;
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
    background-color: var(--color-surface-hover, #eef5fc);
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

@media (max-width: 480px) {
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
    <div class="jadwal-frame">

        <div class="logo-container">
            <img src="<?= asset('assets/binwasnaker.png') ?>" alt="Binwasnaker">
            <img src="<?= asset('assets/kemnaker.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker.png') ?>" alt="Kemnaker">
            <img src="<?= asset('assets/penguji k3.png') ?>" alt="Penguji K3">
        </div>

        <div class="header-title">KEMENTERIAN KETENAGAKERJAAN</div>
        <div class="sub-title">
            <span>BALAI KESELAMATAN DAN</span>
            <span>KESEHATAN KERJA MEDAN</span>
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
