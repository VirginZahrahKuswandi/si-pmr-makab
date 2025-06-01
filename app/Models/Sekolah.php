<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    protected $fillable = ['nama', 'alamat', 'tahun_berdiri_pmr', 'penanggungjawab', 'kontak_pj', 'pembina', 'kontak_pembina', 'latitude', 'longitude'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalSekolah::class);
    }
}
