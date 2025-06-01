<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'konten',
        'slug',
        'gambar',
        'user_id',
        'status',
        'published_at',
        'kategori',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
