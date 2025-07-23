<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtikelFoto extends Model
{
    use HasFactory;

    protected $table = 'artikel_foto';

    protected $fillable = [
        'artikel_id',
        'path',
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
