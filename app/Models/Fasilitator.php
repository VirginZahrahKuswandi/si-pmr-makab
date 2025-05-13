<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitator extends Model
{
    protected $table = 'fasilitator';

    protected $fillable = [
        'nama',
        'pelatihan_sertifikasi',
        'pendidikan_terakhir',
        'nomor_anggota_pmi',
        'nomor_anggota_makab'
    ];
}
