<style>
.not-found-wrapper {
    text-align: center;
    padding: 90px 20px 120px;
    max-width: 650px;
    margin: auto;
}

.not-found-code {
    font-size: 110px;
    font-weight: 800;
    color: var(--color-primary, #003366);
    line-height: 1;
    margin-bottom: 15px;
    letter-spacing: -0.04em;
}

.not-found-title {
    font-size: 26px;
    font-weight: 700;
    color: var(--color-text-main, #0f172a);
    margin-bottom: 15px;
    letter-spacing: -0.01em;
}

.not-found-desc {
    font-size: 16px;
    color: var(--color-text-muted, #64748b);
    margin-bottom: 35px;
    line-height: 1.6;
}

.btn-home {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: var(--color-primary, #003366);
    color: #ffffff;
    padding: 12px 28px;
    border-radius: var(--radius-md, 10px);
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    box-shadow: 0 4px 14px rgba(0, 51, 102, 0.2);
    position: relative;
    overflow: hidden;
    transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.2s ease,
                background-color 0.2s ease;
}

.btn-home:hover {
    background: var(--color-primary-dark, #002244);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(0, 51, 102, 0.28);
    color: #ffffff;
}

.btn-home:active {
    transform: translateY(0) scale(0.98);
}
</style>

<div class="not-found-wrapper">
    <div class="not-found-code">404</div>
    <h1 class="not-found-title">Halaman Tidak Ditemukan</h1>
    <p class="not-found-desc">
        Maaf, halaman yang Anda tuju tidak dapat ditemukan atau telah dipindahkan ke tautan baru yang lebih rapi (clean URL).
    </p>
    <a href="<?= url('/') ?>" class="btn-home btn-shimmer">
        ← Kembali ke Beranda
    </a>
</div>
