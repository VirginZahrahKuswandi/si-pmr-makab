<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\FasilitatorController;
use App\Http\Controllers\JadwalSekolahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return Inertia::render('dashboard');
// });

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

Route::get('/profil-fasilitator', [FasilitatorController::class, 'index']);

Route::get('/siswa/by-sekolah/{id}', [SekolahController::class, 'getSiswaBySekolah']);

Route::get('/jadwal-sekolah', [JadwalSekolahController::class, 'index'])->name('jadwal.index');

Route::post('/jadwal-sekolah/{id}/ambil', [JadwalSekolahController::class, 'ambil'])->name('jadwal.ambil');
Route::post('/jadwal-sekolah/{id}/batal', [JadwalSekolahController::class, 'batal'])->name('jadwal.batal');


Route::get('/riwayat-mengajar', [FasilitatorController::class, 'riwayatMengajar'])->middleware('auth');

Route::get('/profil', [FasilitatorController::class, 'profil'])->middleware('auth')->name('profil');


Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

Route::middleware(['auth', IsAdmin::class])->group(function () {});

Route::middleware('fasilitator')->group(function () {
    Route::get('/daftar-sekolah', [SekolahController::class, 'index']);
});

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::middleware('auth')->group(function () {
    Route::get('/artikel/{slug}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{slug}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{slug}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
});

Route::delete('/artikel/foto/{id}', [ArtikelController::class, 'deleteFoto'])->name('artikel.foto.destroy');

Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
