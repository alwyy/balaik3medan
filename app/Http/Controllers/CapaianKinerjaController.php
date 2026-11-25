<?php

namespace App\Http\Controllers;

use App\Models\CapaianKinerjaModel;
use Illuminate\Http\Request;

class CapaianKinerjaController extends Controller
{
    public function index()
    {
        $allData = CapaianKinerjaModel::getData();
        $summary = CapaianKinerjaModel::getSummary();
        $kpi = CapaianKinerjaModel::getKpiUtama();
        $sasaran = CapaianKinerjaModel::getSasaranStrategis();
        $sebaran = CapaianKinerjaModel::getSebaranPeserta();
        $companies = CapaianKinerjaModel::getPerusahaanMitra();
        $tren = CapaianKinerjaModel::getTrenBulanan();
        $sektor = CapaianKinerjaModel::getSebaranSektor();

        return view('public.capaian-kinerja', [
            'title' => 'Sasaran Strategis & Capaian Kinerja – Balai K3 Medan',
            'activePage' => 'capaian-kinerja',
            'isHome' => false,
            'kinerja' => $allData,
            'summary' => $summary,
            'kpi' => $kpi,
            'sasaran' => $sasaran,
            'sebaran' => $sebaran,
            'companies' => $companies,
            'tren' => $tren,
            'sektor' => $sektor
        ]);
    }
}
