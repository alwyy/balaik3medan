<?php
/**
 * TugasFungsiController
 * Menangani halaman Tugas & Fungsi
 */

class TugasFungsiController extends Controller {
    public function index() {
        $data = [
            'title' => 'Tugas & Fungsi – Balai K3 Medan',
            'activePage' => 'tugas-fungsi',
            'isHome' => false
        ];

        $this->view('public/tugas-fungsi/index', $data);
    }
}
