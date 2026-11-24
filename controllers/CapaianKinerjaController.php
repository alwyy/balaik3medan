<?php
/**
 * CapaianKinerjaController
 * Menangani halaman Sasaran Strategis & Capaian Kinerja Balai K3 Medan
 * Terintegrasi penuh dengan CapaianKinerjaModel (CMS Ready)
 */

require_once APP_ROOT . '/models/CapaianKinerjaModel.php';

class CapaianKinerjaController extends Controller {

    public function index() {
        $allData = CapaianKinerjaModel::getData();
        $summary = CapaianKinerjaModel::getSummary();
        $kpi = CapaianKinerjaModel::getKpiUtama();
        $sasaran = CapaianKinerjaModel::getSasaranStrategis();
        $sebaran = CapaianKinerjaModel::getSebaranPeserta();
        $companies = CapaianKinerjaModel::getPerusahaanMitra();
        $tren = CapaianKinerjaModel::getTrenBulanan();
        $sektor = CapaianKinerjaModel::getSebaranSektor();

        $data = [
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
        ];

        $this->view('public/capaian-kinerja/index', $data);
    }
}
