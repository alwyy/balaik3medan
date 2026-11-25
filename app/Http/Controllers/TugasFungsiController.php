<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasFungsiController extends Controller
{
    public function index()
    {
        return view('public.tugas-fungsi', [
            'title' => 'Tugas dan Fungsi – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'tugas-fungsi',
            'isHome' => false
        ]);
    }
}
