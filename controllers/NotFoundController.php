<?php
/**
 * NotFoundController
 * Menangani respon halaman 404 Not Found
 */

class NotFoundController extends Controller {
    public function index() {
        http_response_code(404);
        $data = [
            'title' => 'Halaman Tidak Ditemukan – 404',
            'activePage' => '404',
            'isHome' => false
        ];

        $this->view('public/404', $data);
    }
}
