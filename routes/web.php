<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\FasilitatorController;
use App\Http\Controllers\JadwalSekolahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return view(('home'));
})->name('home');

// Route::get('/dashboard', function () {
//     return Inertia::render('dashboard');
// });

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

Route::get('/profil-fasilitator', [FasilitatorController::class, 'index']);

Route::get('/siswa/by-sekolah/{id}', [SekolahController::class, 'getSiswaBySekolah']);

Route::get('/jadwal-sekolah', [JadwalSekolahController::class, 'index'])->name('jadwal.index');

Route::post('/jadwal-sekolah/{id}/ambil', [JadwalSekolahController::class, 'ambil'])->name('jadwal.ambil');

Route::get('/riwayat-mengajar', [FasilitatorController::class, 'riwayatMengajar'])->middleware('auth');
Route::get('/profil', [FasilitatorController::class, 'profil'])->middleware('auth');


Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

Route::middleware(['auth', IsAdmin::class])->group(function () {});

Route::middleware('fasilitator')->group(function () {
    Route::get('/daftar-sekolah', [SekolahController::class, 'index']);
});

Route::get('/news-detail', function () {
    return view('news-detail');
})->name('news.index');
