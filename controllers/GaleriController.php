<?php
/**
 * GaleriController
 * Menangani halaman Galeri Kegiatan (Feed Instagram Resmi @balaik3medan)
 */

require_once APP_ROOT . '/models/InstagramModel.php';

class GaleriController extends Controller {
    public function index() {
        // Ambil 12 postingan Instagram terbaru
        $activities = InstagramModel::getLatestPosts(12);
        $profile = InstagramModel::getProfile();

        $data = [
            'title' => 'Galeri Kegiatan – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'galeri',
            'isHome' => false,
            'activities' => $activities,
            'igProfile' => $profile
        ];

        $this->view('public/galeri/index', $data);
    }
}
