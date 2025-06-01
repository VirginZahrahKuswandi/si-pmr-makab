<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FasilitatorController extends Controller
{
    public function index()
    {
        $fasilitators = Fasilitator::paginate(10);
        return view('profil-fasilitator', compact('fasilitators'));
    }

    public function riwayatMengajar()
    {
        $fasilitator = Fasilitator::with([
            'jadwal.sekolah',
            'jadwal.absensi.fasilitator'
        ])->find(auth()->user()->fasilitator_id);

        if (!$fasilitator) {
            abort(404, 'Fasilitator tidak ditemukan');
        }

        $jadwal = $fasilitator->jadwal;

        return view('fasilitator.riwayat-mengajar', compact('fasilitator', 'jadwal'));
    }

    public function profil()
    {
        $user = Auth::user();

        return view('profil', compact('user'));
    }
}
