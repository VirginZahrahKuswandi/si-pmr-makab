<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalSekolah extends Model
{
    protected $table = 'jadwal_sekolah';

    protected $fillable = [
        'sekolah_id',
        'fasilitator_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'deskripsi',
        'penanggungjawab',
        'kontak_pj',
        'pembina',
        'kontak_pembina'
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }

    public function fasilitator()
    {
        return $this->belongsToMany(Fasilitator::class, 'jadwal_fasilitator');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'jadwal_sekolah_id');
    }
}
