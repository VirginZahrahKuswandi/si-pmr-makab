<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    protected $fillable = ['artikel_id', 'user_id', 'parent_id', 'isi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anakKomentar()
    {
        return $this->hasMany(Komentar::class, 'parent_id')->with('anakKomentar', 'user');
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
