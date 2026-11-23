<?php
/**
 * JenisController
 * Menangani halaman Jenis Layanan K3
 */

class JenisController extends Controller {
    public function index() {
        $data = [
            'title' => 'Jenis Layanan K3 – Balai K3 Medan',
            'activePage' => 'jenis',
            'isHome' => false
        ];

        $this->view('public/jenis/index', $data);
    }
}
