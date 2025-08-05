<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiFoto extends Model
{
    protected $table = 'absensi_foto';
    protected $fillable = ['absensi_id', 'path', 'jenis_absensi_foto_id'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function jenisAbsensiFoto()
    {
        return $this->belongsTo(JenisAbsensiFoto::class, 'jenis_absensi_foto_id');
    }
}
