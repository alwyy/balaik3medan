<?php
/**
 * MaklumatController
 * Menangani halaman Maklumat Pelayanan
 */

class MaklumatController extends Controller {
    public function index() {
        $data = [
            'title' => 'Maklumat Pelayanan – Balai K3 Medan',
            'activePage' => 'maklumat',
            'isHome' => false
        ];

        $this->view('public/maklumat/index', $data);
    }
}
