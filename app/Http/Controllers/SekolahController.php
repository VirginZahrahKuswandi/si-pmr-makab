<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Siswa;


class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        $siswas = Siswa::orderBy('nama_lengkap')->limit(10)->get();
        return view('daftar-sekolah', compact('sekolahs', 'siswas'));
    }

    public function getSiswaBySekolah($id)
    {
        $siswas = Siswa::orderBy('nama_lengkap')->where('id_sekolah', $id)->get();
        return response()->json($siswas);
    }
}
