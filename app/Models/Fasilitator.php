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
        'nomor_anggota_makab',
        'tahun_bergabung_makab',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_rekening_bank_dki',
        'alamat',
        'telepon',
        'npwp',
    ];

    public function jadwalSekolah()
    {
        return $this->belongsToMany(JadwalSekolah::class, 'jadwal_fasilitator');
    }

    public function jadwal()
    {
        return $this->belongsToMany(JadwalSekolah::class, 'jadwal_fasilitator');
    }
}
