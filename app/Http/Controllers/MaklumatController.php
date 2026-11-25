<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaklumatController extends Controller
{
    public function index()
    {
        return view('public.maklumat', [
            'title' => 'Maklumat Pelayanan – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'maklumat',
            'isHome' => false
        ]);
    }
}
