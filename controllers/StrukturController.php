<?php
/**
 * StrukturController
 * Menangani halaman Struktur Organisasi
 */

class StrukturController extends Controller {
    public function index() {
        $data = [
            'title' => 'Struktur Organisasi – Balai K3 Medan',
            'activePage' => 'struktur',
            'isHome' => false
        ];

        $this->view('public/struktur/index', $data);
    }
}
