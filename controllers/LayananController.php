<?php
/**
 * LayananController
 * Menangani halaman Kegiatan Layanan K3
 */

class LayananController extends Controller {
    public function index() {
        $data = [
            'title' => 'Kegiatan Layanan K3 – Balai K3 Medan',
            'activePage' => 'layanan',
            'isHome' => false
        ];

        $this->view('public/layanan/index', $data);
    }
}
