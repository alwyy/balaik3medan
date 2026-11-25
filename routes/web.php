<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\CapaianKinerjaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MaklumatController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TugasFungsiController;

// Rute Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/capaian-kinerja', [CapaianKinerjaController::class, 'index'])->name('capaian-kinerja');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
Route::get('/jenis', [JenisController::class, 'index'])->name('jenis');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/maklumat', [MaklumatController::class, 'index'])->name('maklumat');
Route::get('/standar', [StandarController::class, 'index'])->name('standar');
Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur');
Route::get('/tugas-fungsi', [TugasFungsiController::class, 'index'])->name('tugas-fungsi');

// Redirect otomatis file legacy .php ke Clean URL
Route::get('/{page}.php', function ($page) {
    return redirect('/' . $page, 301);
});
