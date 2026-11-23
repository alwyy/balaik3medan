<?php
/**
 * JadwalController
 * Menangani halaman Jadwal / Jam Pelayanan
 */

class JadwalController extends Controller {
    public function index() {
        $data = [
            'title' => 'Jadwal & Jam Pelayanan – Balai K3 Medan',
            'activePage' => 'jadwal',
            'isHome' => false
        ];

        $this->view('public/jadwal/index', $data);
    }
}
