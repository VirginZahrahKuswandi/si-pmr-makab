<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitator;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel;
use App\Models\User;

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

        $artikels = Artikel::where('user_id', $user->id)->latest()->get();

        $usersWithFasilitator = User::where('id', $user->id)
            ->whereNotNull('fasilitator_id')
            ->with('fasilitator')
            ->get();

        return view('profil', compact('user', 'artikels', 'usersWithFasilitator'));
    }
}
