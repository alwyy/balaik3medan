<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        return view('public.layanan', [
            'title' => 'Alur & Prosedur Pelayanan – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'layanan',
            'isHome' => false
        ]);
    }
}
