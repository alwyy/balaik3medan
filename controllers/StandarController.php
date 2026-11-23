<?php
/**
 * StandarController
 * Menangani halaman Standar Pelayanan
 */

class StandarController extends Controller {
    public function index() {
        $data = [
            'title' => 'Standar Pelayanan – Balai K3 Medan',
            'activePage' => 'standar',
            'isHome' => false
        ];

        $this->view('public/standar/index', $data);
    }
}
