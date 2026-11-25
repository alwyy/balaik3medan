<?php

namespace App\Http\Controllers;

use App\Models\InstagramModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activities = InstagramModel::getLatestPosts(12);
        $profile = InstagramModel::getProfile();

        return view('public.home', [
            'title' => 'Balai Keselamatan dan Kesehatan Kerja Medan – Kemnaker RI',
            'activePage' => 'home',
            'isHome' => true,
            'activities' => $activities,
            'igProfile' => $profile
        ]);
    }
}
