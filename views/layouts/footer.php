<?php
/**
 * Footer Layout Template
 * Tombol floating WhatsApp, tombol scroll ke atas, dan script.js
 */
?>

</main>

<!-- FLOATING ACTION (WHATSAPP) -->
<a href="https://wa.me/6285262229195" target="_blank" rel="noopener noreferrer" id="wa-float" aria-label="Hubungi via WhatsApp">
    <img src="<?= asset('assets/wa.png') ?>" alt="WhatsApp">
</a>

<!-- SCROLL KE ATAS -->
<button id="scrollTop" aria-label="Kembali ke atas">↑</button>

<!-- SCRIPT UTAMA -->
<script src="<?= asset('script.js') ?>?v=<?= filemtime(APP_ROOT . '/script.js') ?>"></script>

<?php if (!empty($extraScripts)) echo $extraScripts; ?>
</body>
</html>
