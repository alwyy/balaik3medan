<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        return view('public.struktur', [
            'title' => 'Struktur Organisasi – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'struktur',
            'isHome' => false
        ]);
    }
}
