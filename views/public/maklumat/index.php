<style>
.maklumat-section {
    padding: 60px 20px 80px;
    background: var(--color-bg, #f8fafc);
    display: flex;
    justify-content: center;
}

.maklumat-frame {
    background: #ffffff;
    border: 3.5px solid #1e293b;
    max-width: 900px;
    width: 100%;
    padding: 40px 48px 60px;
    box-shadow: var(--shadow-lg, 0 10px 28px rgba(15, 23, 42, 0.08));
    border-radius: var(--radius-md, 10px);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.maklumat-frame:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover, 0 16px 36px rgba(0, 51, 102, 0.12));
}

.maklumat-header {
    display: grid;
    grid-template-columns: 80px 1fr 80px;
    align-items: center;
    margin-bottom: 28px;
    gap: 20px;
}

.logo-left {
    width: 78px;
    height: auto;
    object-fit: contain;
    justify-self: start;
    transition: transform 0.25s ease;
}

.logo-left:hover {
    transform: scale(1.05);
}

.logo-right {
    width: 78px;
    height: auto;
    object-fit: contain;
    justify-self: end;
    transition: transform 0.25s ease;
}

.logo-right:hover {
    transform: scale(1.05);
}

.header-center {
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.header-center h4 {
    margin: 3px 0;
    font-size: 14.5px;
    color: var(--color-text-main, #0f172a);
    font-weight: 700;
    line-height: 1.35;
    text-align: center;
}

.maklumat-brand-title {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 4px;
}

.maklumat-brand-title span {
    display: block;
    font-size: 14.5px;
    color: var(--color-text-main, #0f172a);
    font-weight: 800;
    line-height: 1.35;
    text-align: center;
    letter-spacing: 0.02em;
}

.logo-center {
    display: block !important;
    width: 82px;
    height: auto;
    margin: 0 auto 10px auto !important;
    object-fit: contain;
    transition: transform 0.25s ease;
}

.logo-center:hover {
    transform: scale(1.05);
}

.maklumat-title {
    text-align: center;
    font-size: 32px;
    letter-spacing: 0.05em;
    margin: 36px 0 24px;
    color: var(--color-primary, #003366);
    font-weight: 800;
    position: relative;
}

.maklumat-title::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: var(--color-primary, #003366);
    margin: 12px auto 0;
    border-radius: 2px;
}

.maklumat-content {
    text-align: center;
    font-size: 15.5px;
    line-height: 1.9;
    color: var(--color-text-body, #334155);
}

.maklumat-isi {
    font-weight: 600;
    margin: 28px auto 32px;
    max-width: 720px;
    font-size: 16.5px;
    color: var(--color-text-main, #0f172a);
    padding: 20px 24px;
    background: var(--color-surface-hover, #eef5fc);
    border-radius: var(--radius-lg, 14px);
    border: 1px solid var(--color-border, #e2e8f0);
}

.maklumat-jabatan {
    margin-top: 28px;
    font-weight: 700;
    color: var(--color-text-main, #0f172a);
    letter-spacing: 0.03em;
}

.maklumat-ttd {
    margin-top: 16px;
}

.barcode-link {
    display: inline-block;
    cursor: pointer;
    border-radius: var(--radius-md, 10px);
    padding: 4px;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s ease;
}

.barcode-link:hover {
    transform: translateY(-2px) scale(1.03);
}

.barcode-link .barcode-img-box {
    width: 130px;
    height: 130px;
    margin: 0 auto 10px;
    border-radius: var(--radius-md, 10px);
}

.barcode-link img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

@media (max-width: 768px) {
    .maklumat-frame {
        padding: 28px 20px 44px;
    }

    .maklumat-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
    }

    .header-center {
        order: 1;
    }

    .logo-left {
        order: 0;
    }

    .logo-right {
        order: 2;
    }

    .maklumat-title {
        font-size: 24px;
    }

    .maklumat-isi {
        font-size: 15px;
        padding: 16px;
    }
}
</style>

<!-- MAKLUMAT CONTENT -->
<section class="maklumat-section">
    <div class="maklumat-frame">

        <div class="maklumat-header">
            <img src="<?= asset('assets/binwasnaker.png') ?>" class="logo-left" alt="Binwasnaker">

            <div class="header-center">
                <img src="<?= asset('assets/kemnaker.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker.png') ?>" class="logo-center" alt="Kemnaker">
                <h4>KEMENTERIAN KETENAGAKERJAAN</h4>
                <h4>DIREKTORAT JENDERAL PEMBINAAN PENGAWASAN KETENAGAKERJAAN DAN K3</h4>
                <div class="maklumat-brand-title">
                    <span>BALAI KESELAMATAN DAN</span>
                    <span>KESEHATAN KERJA MEDAN</span>
                </div>
            </div>

            <img src="<?= asset('assets/penguji k3.png') ?>" class="logo-right" alt="K3">
        </div>

        <h1 class="maklumat-title">MAKLUMAT PELAYANAN</h1>

        <div class="maklumat-content">
            <p>
                DENGAN INI KAMI SELURUH PEGAWAI<br>
                BALAI KESELAMATAN DAN<br>
                KESEHATAN KERJA MEDAN<br>
                MENYATAKAN
            </p>

            <div class="maklumat-isi">
                "SIAP MENYELENGGARAKAN PELAYANAN SESUAI STANDAR PELAYANAN
                YANG TELAH DITETAPKAN DAN KAMI SIAP MENERIMA KRITIK,
                SARAN, DAN SANKSI GUNA PERBAIKAN PELAYANAN"
            </div>

            <p class="maklumat-jabatan">KEPALA BALAI K3 MEDAN</p>

            <div class="maklumat-ttd">
                <a href="https://tte.kemnaker.go.id/qr-code/4a2a73af8179b4e361b31c86929ced62" target="_blank" rel="noopener noreferrer" class="barcode-link" title="Verifikasi Tanda Tangan Elektronik Kemnaker">
                    <div class="barcode-img-box img-skeleton-wrap">
                        <img src="<?= asset('assets/barcode.png') ?>" alt="Barcode Tanda Tangan Elektronik" loading="lazy">
                    </div>
                </a>
                <p>
                    <strong>dr. Muzakir, M.K.M.</strong><br>
                    NIP. 19740214 200501 1 002
                </p>
            </div>
        </div>

    </div>
</section>
