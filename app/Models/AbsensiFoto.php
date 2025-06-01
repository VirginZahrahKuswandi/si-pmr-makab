<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiFoto extends Model
{
    protected $table = 'absensi_foto';
    protected $fillable = ['absensi_id', 'path'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
