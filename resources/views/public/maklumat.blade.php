@extends('layouts.app')

@section('content')
<style>
.maklumat-section {
    padding: 0 20px 50px;
    background: var(--color-bg, #f8fafc);
    display: flex;
    justify-content: center;
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
    top: -30px;
    left: -70px;
    width: 440px;
    max-width: 36vw;
    height: auto;
    transform: rotate(-14deg);
}

.abstract-line-decor.decor-bottom-right {
    bottom: -60px;
    right: -80px;
    width: 500px;
    max-width: 40vw;
    height: auto;
    transform: rotate(166deg) scaleX(-1);
}

.abstract-line-img {
    width: 100%;
    height: auto;
    display: block;
}

.maklumat-frame {
    position: relative;
    z-index: 2;
    background: #ffffff;
    max-width: 900px;
    width: 100%;
    margin-top: 0;
    padding: 26px 44px 50px;
    box-sizing: border-box;
    overflow: hidden;
    /* BINGKAI EMAS / GOLD ORNATE FRAME */
    border-style: solid;
    border-width: 48px;
    border-image-source: url('<?= asset('assets/gold_frame.png') ?>');
    border-image-slice: 81 80 80 80;
    border-image-repeat: stretch;
    background-clip: padding-box;
    box-shadow: 0 16px 44px rgba(15, 23, 42, 0.20), 0 4px 14px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.maklumat-frame:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 52px rgba(15, 23, 42, 0.24), 0 6px 18px rgba(0, 0, 0, 0.10);
}

/* WATERMARK OPACITY WARNA LOGO KEMNAKER */
.maklumat-watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 480px;
    max-width: 60%;
    pointer-events: none;
    user-select: none;
    z-index: 1;
    opacity: 0.08; /* Opacity warna asli logo Kemnaker */
    display: flex;
    align-items: center;
    justify-content: center;
}

.maklumat-watermark-img {
    width: 100%;
    height: auto;
    object-fit: contain;
}

.maklumat-header,
.maklumat-title,
.maklumat-content {
    position: relative;
    z-index: 2;
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
    .maklumat-frame {
        border-width: 36px;
        padding: 32px 28px 44px;
    }
}

@media (max-width: 768px) {
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
    .maklumat-frame {
        border-width: 24px;
        padding: 22px 16px 32px;
    }
}

@media (max-width: 480px) {
    .maklumat-frame {
        border-width: 18px;
        padding: 18px 10px 24px;
    }
}

/* KOP SURAT & 3 LOGO SEJAJAR (LETAK & UKURAN PERSIS GAMBAR) */
.maklumat-header {
    margin-bottom: 24px;
    text-align: center;
}

.maklumat-logos-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 32px;
    margin: 0 auto 16px;
    padding: 0;
}

.logo-item {
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-item.logo-left img {
    height: 56px;
    width: auto;
    object-fit: contain;
    transition: transform 0.25s ease;
}

.logo-item.logo-center img {
    height: 82px;
    width: auto;
    object-fit: contain;
    transition: transform 0.25s ease;
}

.logo-item.logo-right img {
    height: 56px;
    width: auto;
    object-fit: contain;
    transition: transform 0.25s ease;
}

.logo-item img:hover {
    transform: scale(1.05);
}

.maklumat-header-text h4 {
    margin: 2px 0;
    font-size: 14.5px;
    color: var(--color-text-main, #0f172a);
    font-weight: 700;
    line-height: 1.35;
    text-align: center;
}

.maklumat-brand-title {
    margin-top: 4px;
}

.maklumat-brand-title span {
    display: block;
    font-size: 15px;
    color: var(--color-text-main, #0f172a);
    font-weight: 800;
    line-height: 1.35;
    text-align: center;
    letter-spacing: 0.02em;
}

.maklumat-title {
    text-align: center;
    font-size: 32px;
    letter-spacing: 0.05em;
    margin: 32px 0 24px;
    color: var(--color-primary, #09377D);
    font-weight: 800;
    position: relative;
}

.maklumat-title::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: var(--color-primary, #09377D);
    margin: 12px auto 0;
    border-radius: 2px;
}

.maklumat-content {
    text-align: center;
    font-size: 15.5px;
    line-height: 1.9;
    color: var(--color-text-body, #334155);
}

/* BAGIAN PERNYATAAN (FILL DIHILANGKAN MENJADI TRANSPARAN) */
.maklumat-isi {
    font-weight: 700;
    margin: 24px auto 30px;
    max-width: 720px;
    font-size: 16.5px;
    line-height: 1.8;
    color: var(--color-text-main, #0f172a);
    padding: 8px 12px;
    background: transparent;
    border: none;
    border-radius: 0;
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
        padding: 22px 16px 36px;
    }

    .maklumat-logos-row {
        gap: 20px;
        margin-bottom: 14px;
        padding: 0 4px;
    }

    .logo-item.logo-left img {
        height: 46px;
    }

    .logo-item.logo-center img {
        height: 68px;
    }

    .logo-item.logo-right img {
        height: 46px;
    }

    .maklumat-header-text h4 {
        font-size: 12px;
    }

    .maklumat-brand-title span {
        font-size: 13px;
    }

    .maklumat-title {
        font-size: 22px;
        margin: 24px 0 18px;
    }

    .maklumat-isi {
        font-size: 14.5px;
        padding: 6px 4px;
    }

    .maklumat-watermark {
        width: 320px;
        max-width: 80%;
    }
}
</style>

<!-- MAKLUMAT CONTENT -->
<section class="maklumat-section">

    <!-- DEKORASI LINE ABSTRACT KIRI ATAS -->
    <div class="abstract-line-decor decor-top-left" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="abstract-line-img">
    </div>

    <!-- DEKORASI LINE ABSTRACT KANAN BAWAH -->
    <div class="abstract-line-decor decor-bottom-right" aria-hidden="true">
        <img src="<?= asset('assets/decor_loop_navy.png') ?>" alt="" class="abstract-line-img">
    </div>

    <div class="maklumat-frame">

        <!-- WATERMARK OPACITY WARNA DARI LOGO KEMNAKER -->
        <div class="maklumat-watermark" aria-hidden="true">
            <img src="<?= asset('assets/kemnaker_mark.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker_mark.png') ?>" alt="" class="maklumat-watermark-img">
        </div>

        <div class="maklumat-header">
            <!-- 3 LOGO SEJAJAR HORIZONTAL (SESUAI UKURAN & POSISI ACUAN) -->
            <div class="maklumat-logos-row">
                <div class="logo-item logo-left">
                    <img src="<?= asset('assets/binwasnaker.png') ?>" alt="Binwasnaker">
                </div>
                <div class="logo-item logo-center">
                    <img src="<?= asset('assets/kemnaker_mark.png') ?>?v=<?= filemtime(APP_ROOT . '/assets/kemnaker_mark.png') ?>" alt="Kemnaker">
                </div>
                <div class="logo-item logo-right">
                    <img src="<?= asset('assets/penguji k3.png') ?>" alt="Penguji K3">
                </div>
            </div>

            <!-- TEKS KOP SURAT KEMENTERIAN DI BAWAHNYA -->
            <div class="maklumat-header-text">
                <h4>KEMENTERIAN KETENAGAKERJAAN</h4>
                <h4>DIREKTORAT JENDERAL PEMBINAAN PENGAWASAN KETENAGAKERJAAN DAN K3</h4>
                <div class="maklumat-brand-title">
                    <span>BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN</span>
                </div>
            </div>
        </div>

        <h1 class="maklumat-title">MAKLUMAT PELAYANAN</h1>

        <div class="maklumat-content">
            <p>
                DENGAN INI KAMI SELURUH PEGAWAI<br>
                BALAI KESELAMATAN DAN KESEHATAN KERJA MEDAN
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


@endsection
