<?php

// controllers/AbsensiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Fasilitator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\AbsensiFoto;
use App\Models\AbsensiFasilitator;

class AbsensiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jadwal_sekolah_id' => 'required|exists:jadwal_sekolah,id',
            'jumlah_siswa_hadir' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'foto' => 'required|array|min:1',
            'foto.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $fasilitatorId = auth()->user()->fasilitator_id;

        // Cek apakah fasilitator sudah absen untuk jadwal ini
        $sudahAbsen = AbsensiFasilitator::whereHas('absensi', function ($query) use ($request) {
            $query->where('jadwal_sekolah_id', $request->jadwal_sekolah_id);
        })->where('fasilitator_id', $fasilitatorId)->exists();

        if ($sudahAbsen) {
            return back()->with('error', 'Anda sudah melakukan absensi untuk jadwal ini.');
        }

        // Simpan data absensi utama
        $absensi = Absensi::create([
            'jadwal_sekolah_id' => $request->jadwal_sekolah_id,
            'jumlah_siswa_hadir' => $request->jumlah_siswa_hadir,
            'deskripsi' => $request->deskripsi,
        ]);

        // Simpan semua foto dokumentasi
        foreach ($request->file('foto') as $file) {
            $path = $file->store('absensi_foto', 'public');

            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
            ]);
        }

        // Tambahkan data fasilitator absensi (default status: hadir dan pending)
        AbsensiFasilitator::create([
            'absensi_id' => $absensi->id,
            'fasilitator_id' => $fasilitatorId,
            'status' => 'sudah_absen',
            'status_verifikasi' => 'pending',
        ]);

        return back()->with('success', 'Absensi berhasil dikirim.');
    }
}
