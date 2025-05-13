<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\FasilitatorController;

Route::get('/', function () {
    return view(('home'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

Route::get('/daftar-sekolah', [SekolahController::class, 'index']);
Route::get('/profil-fasilitator', [FasilitatorController::class, 'index']);

Route::get('/siswa/by-sekolah/{id}', [SekolahController::class, 'getSiswaBySekolah']);
