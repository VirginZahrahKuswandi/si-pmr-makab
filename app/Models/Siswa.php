<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sekolah;

class Siswa extends Model
{
    protected $table = "siswa";

    protected $fillable = [
        'id_sekolah',
        'nis',
        'nisn',
        'nama_lengkap',
        'nama_panggilan',
        'kelas',
        'no_telp',
        'alamat',
        'golongan_darah'
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }
}
