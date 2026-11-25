<?php

namespace App\Http\Controllers;

use App\Models\CapaianKinerjaModel;
use Illuminate\Http\Request;

class CapaianKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $options = CapaianKinerjaModel::getDynamicOptions();

        $defaultTipe = $options['default_tipe'] ?? 'bulanan';
        $defaultTahun = $options['default_tahun'] ?? 2026;
        $defaultBulan = $options['default_bulan'] ?? '01';

        $tipe = $request->query('tipe', $defaultTipe);
        if (!in_array($tipe, ['bulanan', 'tahunan'])) {
            $tipe = $defaultTipe;
        }

        $tahun = (int)$request->query('tahun', $defaultTahun);
        $bulan = sprintf('%02d', (int)$request->query('bulan', $defaultBulan));

        $activeReport = CapaianKinerjaModel::getReportData($tipe, $tahun, $bulan);
        $bundle = CapaianKinerjaModel::getAllReportsBundle();

        return view('public.capaian-kinerja', [
            'title' => 'Sasaran Strategis & Capaian Kinerja – Balai K3 Medan',
            'activePage' => 'capaian-kinerja',
            'isHome' => false,
            'activeTipe' => $tipe,
            'activeTahun' => $tahun,
            'activeBulan' => $bulan,
            'options' => $options,
            'report' => $activeReport,
            'bundle' => $bundle
        ]);
    }
}
