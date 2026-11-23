<?php
/**
 * CapaianKinerjaController
 * Menangani halaman Capaian Kinerja & Sasaran Strategis
 */

class CapaianKinerjaController extends Controller {
    public function index() {
        $data = [
            'title' => 'Sasaran Strategis & Capaian Kinerja – Balai K3 Medan',
            'activePage' => 'capaian-kinerja',
            'isHome' => false
        ];

        $this->view('public/capaian-kinerja/index', $data);
    }
}
