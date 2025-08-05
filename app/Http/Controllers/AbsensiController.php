<?php

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
            'jumlah_siswa_hadir' => 'required|integer',
            'deskripsi' => 'required|string',
            'materi' => 'nullable|string',
            'tugas_berikutnya' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'fasilitator_mengajar' => $request->isMethod('post') ? 'required|image' : 'nullable|image',
            'anggota_praktik' => $request->isMethod('post') ? 'required|image' : 'nullable|image',
            'foto_bersama' => $request->isMethod('post') ? 'required|image' : 'nullable|image',
        ]);


        $fasilitatorId = auth()->user()->fasilitator_id;

        $sudahAbsen = AbsensiFasilitator::whereHas('absensi', function ($query) use ($request) {
            $query->where('jadwal_sekolah_id', $request->jadwal_sekolah_id);
        })->where('fasilitator_id', $fasilitatorId)->exists();


        $sudahAbsen = AbsensiFasilitator::whereHas('absensi', function ($query) use ($request) {
            $query->where('jadwal_sekolah_id', $request->jadwal_sekolah_id);
        })
            ->where('fasilitator_id', $fasilitatorId)
            ->where('status_verifikasi', '!=', 'ditolak')
            ->exists();

        if ($sudahAbsen) {
            return back()->withErrors(['error' => 'Anda sudah melakukan absensi untuk jadwal ini.']);
        }

        $absensi = Absensi::create([
            'jadwal_sekolah_id' => $request->jadwal_sekolah_id,
            'jumlah_siswa_hadir' => $request->jumlah_siswa_hadir,
            'deskripsi' => $request->deskripsi,
            'materi' => $request->materi,
            'tugas_berikutnya' => $request->tugas_berikutnya,
            'lokasi' => $request->lokasi,
            'waktu_absen' => now(),
        ]);

        // Dokumentasi Fasilitator Mengajar (jenis = 1)
        if ($request->hasFile('fasilitator_mengajar')) {
            $path = $request->file('fasilitator_mengajar')->store('absensi_foto', 'public');
            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
                'jenis_absensi_foto_id' => 1,
            ]);
        }

        // Dokumentasi Anggota Praktik (jenis = 2)
        if ($request->hasFile('anggota_praktik')) {
            $path = $request->file('anggota_praktik')->store('absensi_foto', 'public');
            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
                'jenis_absensi_foto_id' => 2,
            ]);
        }

        // Dokumentasi Foto Bersama (jenis = 3)
        if ($request->hasFile('foto_bersama')) {
            $path = $request->file('foto_bersama')->store('absensi_foto', 'public');
            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
                'jenis_absensi_foto_id' => 3,
            ]);
        }

        AbsensiFasilitator::create([
            'absensi_id' => $absensi->id,
            'fasilitator_id' => $fasilitatorId,
            'status' => 'sudah_absen',
            'status_verifikasi' => 'pending',
        ]);

        return back()->with('success', 'Absensi berhasil dikirim.');
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'jumlah_siswa_hadir' => 'required|integer',
            'deskripsi' => 'required|string',
            'materi' => 'nullable|string',
            'tugas_berikutnya' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'fasilitator_mengajar' => 'nullable|image',
            'anggota_praktik' => 'nullable|image',
            'foto_bersama' => 'nullable|image',
        ]);

        // Update data absensi
        $absensi->update([
            'jumlah_siswa_hadir' => $request->jumlah_siswa_hadir,
            'deskripsi' => $request->deskripsi,
            'materi' => $request->materi,
            'tugas_berikutnya' => $request->tugas_berikutnya,
            'lokasi' => $request->lokasi,
        ]);

        // Dokumentasi Fasilitator Mengajar (jenis = 1)
        if ($request->hasFile('fasilitator_mengajar')) {
            $oldFoto = AbsensiFoto::where('absensi_id', $absensi->id)
                ->where('jenis_absensi_foto_id', 1)
                ->first();
            if ($oldFoto) {
                Storage::disk('public')->delete($oldFoto->path);
                $oldFoto->delete();
            }
            $path = $request->file('fasilitator_mengajar')->store('absensi_foto', 'public');
            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
                'jenis_absensi_foto_id' => 1,
            ]);
        }

        // Dokumentasi Anggota Praktik (jenis = 2)
        if ($request->hasFile('anggota_praktik')) {
            $oldFoto = AbsensiFoto::where('absensi_id', $absensi->id)
                ->where('jenis_absensi_foto_id', 2)
                ->first();
            if ($oldFoto) {
                Storage::disk('public')->delete($oldFoto->path);
                $oldFoto->delete();
            }
            $path = $request->file('anggota_praktik')->store('absensi_foto', 'public');
            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
                'jenis_absensi_foto_id' => 2,
            ]);
        }

        // Dokumentasi Foto Bersama (jenis = 3)
        if ($request->hasFile('foto_bersama')) {
            $oldFoto = AbsensiFoto::where('absensi_id', $absensi->id)
                ->where('jenis_absensi_foto_id', 3)
                ->first();
            if ($oldFoto) {
                Storage::disk('public')->delete($oldFoto->path);
                $oldFoto->delete();
            }
            $path = $request->file('foto_bersama')->store('absensi_foto', 'public');
            AbsensiFoto::create([
                'absensi_id' => $absensi->id,
                'path' => $path,
                'jenis_absensi_foto_id' => 3,
            ]);
        }

        // Update waktu update di pivot
        $fasilitatorId = auth()->user()->fasilitator_id;
        $pivot = AbsensiFasilitator::where('absensi_id', $absensi->id)
            ->where('fasilitator_id', $fasilitatorId)
            ->first();

        if ($pivot) {
            $pivot->update([
                'status_verifikasi' => 'pending',
                'waktu_absen' => now(),
                'updated_at' => now()
            ]);
        }

        return back()->with('success', 'Absensi berhasil diperbarui.');
    }
}
