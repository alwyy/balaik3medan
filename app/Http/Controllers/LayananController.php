<?php

namespace App\Http\Controllers;

use App\Models\JenisLayananModel;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $meta = JenisLayananModel::getMeta();
        $categories = JenisLayananModel::getCategories();
        $activeCategory = $request->query('kategori', 'all');
        $searchKeyword = $request->query('q', '');

        $services = JenisLayananModel::getServices($activeCategory, $searchKeyword);
        $allServices = JenisLayananModel::getServices();

        return view('public.jenis', [
            'title' => 'Alur & Prosedur Pelayanan – Balai Keselamatan dan Kesehatan Kerja Medan',
            'activePage' => 'layanan',
            'isHome' => false,
            'meta' => $meta,
            'categories' => $categories,
            'activeCategory' => $activeCategory,
            'searchKeyword' => $searchKeyword,
            'services' => $services,
            'allServices' => $allServices
        ]);
    }
}
