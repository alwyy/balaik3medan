<?php

namespace App\Http\Controllers;

use App\Models\InstagramModel;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $activities = InstagramModel::getLatestPosts(12);
        $profile = InstagramModel::getProfile();

        return view('public.galeri', [
            'title' => 'Galeri Kegiatan – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'galeri',
            'isHome' => false,
            'activities' => $activities,
            'igProfile' => $profile
        ]);
    }
}
