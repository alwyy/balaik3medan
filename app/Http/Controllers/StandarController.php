<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandarController extends Controller
{
    public function index()
    {
        return view('public.standar', [
            'title' => 'Standar Pelayanan Publik – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'standar',
            'isHome' => false
        ]);
    }
}
