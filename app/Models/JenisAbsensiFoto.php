<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisAbsensiFoto extends Model
{
    protected $table = 'jenis_absensi_foto';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
    public function absensiFoto()
    {
        return $this->hasMany(AbsensiFoto::class, 'jenis_absensi_foto_id');
    }
}
