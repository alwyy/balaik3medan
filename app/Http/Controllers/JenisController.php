<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        return view('public.jenis', [
            'title' => 'Jenis Layanan Pengujian & Pembinaan K3 – Balai K3 Medan',
            'activePage' => 'jenis',
            'isHome' => false
        ]);
    }
}
