<?php

namespace App\Http\Controllers;

use App\Models\CapaianKinerjaModel;
use Illuminate\Http\Request;

class CapaianKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $periodeMenu = CapaianKinerjaModel::getPeriodeMenu();
        $defaultTipe = $periodeMenu['tipe_default'] ?? 'bulanan';
        $defaultTahun = $periodeMenu['tahun_default'] ?? 2026;
        $defaultBulan = $periodeMenu['bulan_default'] ?? '01';

        $tipe = $request->query('tipe', $defaultTipe);
        if (!in_array($tipe, ['bulanan', 'tahunan'])) {
            $tipe = 'bulanan';
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
            'periodeMenu' => $periodeMenu,
            'report' => $activeReport,
            'bundle' => $bundle,
            // Fallback backward-compatible variables:
            'kinerja' => $activeReport,
            'summary' => $activeReport['ringkasan_eksekutif'] ?? [],
            'kpi' => $activeReport['kpi_utama'] ?? [],
            'sasaran' => $activeReport['sasaran_strategis'] ?? [],
            'sebaran' => $activeReport['sebaran_peserta_webinar'] ?? [],
            'companies' => $activeReport['perusahaan_mitra'] ?? []
        ]);
    }
}
