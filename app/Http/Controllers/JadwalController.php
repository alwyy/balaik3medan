<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        return view('public.jadwal', [
            'title' => 'Jam & Jadwal Pelayanan – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'jadwal',
            'isHome' => false
        ]);
    }
}
