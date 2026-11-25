<?php

namespace App\Http\Controllers;

use App\Models\JenisLayananModel;
use Illuminate\Http\Request;

class JenisController extends Controller
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
            'title' => 'Jenis Layanan Pengujian & Pembinaan K3 – Balai K3 Medan',
            'activePage' => 'jenis',
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
