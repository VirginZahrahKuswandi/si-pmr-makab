<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSekolah;
use Illuminate\Support\Facades\Auth;

class JadwalSekolahController extends Controller
{
    public function index(Request $request)
    {
        $fasilitatorId = Auth::check() ? Auth::user()->fasilitator_id : null;
        $query = JadwalSekolah::with(['fasilitator', 'sekolah'])
            ->withCount(['fasilitator as diambil' => function ($q) use ($fasilitatorId) {
                if ($fasilitatorId) {
                    $q->where('fasilitator_id', $fasilitatorId);
                }
            }])
            ->orderByDesc('diambil');

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $jadwal_sekolah = $query->paginate(10)->withQueryString();

        return view('jadwal_sekolah', compact('jadwal_sekolah'));
    }

    public function ambil($id)
    {
        $jadwal = JadwalSekolah::findOrFail($id);
        $fasilitatorId = Auth::user()->fasilitator_id;

        if (!$fasilitatorId) {
            return redirect()->back()->with('error', 'Akun Anda tidak memiliki fasilitator_id.');
        }

        // Cek apakah sudah pernah mengambil
        $sudahAmbil = $jadwal->fasilitator()->where('fasilitator_id', $fasilitatorId)->exists();

        if ($sudahAmbil) {
            return redirect()->back()->with('error', 'Anda sudah mengambil jadwal ini.');
        }

        $jadwal->fasilitator()->attach($fasilitatorId);

        return redirect()->route('jadwal.index')->with('success', 'Anda telah mengambil jadwal ini.');
    }

    public function batal($id)
    {
        $jadwal = JadwalSekolah::findOrFail($id);
        $fasilitatorId = auth()->user()->fasilitator_id;

        if (!$fasilitatorId) {
            return redirect()->back()->with('error', 'Anda tidak memiliki fasilitator ID.');
        }

        $jadwal->fasilitator()->detach($fasilitatorId);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibatalkan.');
    }
}
