<?php

// models/Absensi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'jadwal_sekolah_id',
        'jumlah_siswa_hadir',
        'deskripsi',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalSekolah::class, 'jadwal_sekolah_id');
    }

    public function foto()
    {
        return $this->hasMany(AbsensiFoto::class);
    }

    public function fasilitator()
    {
        return $this->belongsToMany(Fasilitator::class, 'absensi_fasilitator')
            ->withPivot('status', 'status_verifikasi')
            ->withTimestamps();
    }
}
