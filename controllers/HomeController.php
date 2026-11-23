<?php
/**
 * HomeController
 * Menangani halaman utama (Beranda)
 */

require_once APP_ROOT . '/models/InstagramModel.php';

class HomeController extends Controller {
    public function index() {
        // Ambil 12 postingan Instagram terbaru melalui InstagramModel
        $activities = InstagramModel::getLatestPosts(12);
        $profile = InstagramModel::getProfile();

        $data = [
            'title' => 'Balai Keselamatan dan Kesehatan Kerja Medan – Kemnaker RI',
            'activePage' => 'home',
            'isHome' => true,
            'activities' => $activities,
            'igProfile' => $profile
        ];

        $this->view('public/home/index', $data);
    }
}
