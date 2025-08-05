<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiFasilitator extends Model
{
    protected $table = 'absensi_fasilitator';

    protected $fillable = [
        'absensi_id',
        'fasilitator_id',
        'status',
        'status_verifikasi',
        'keterangan',
        'waktu_absen',
    ];


    public function fasilitator()
    {
        return $this->belongsTo(Fasilitator::class);
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
