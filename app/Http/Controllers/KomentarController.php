<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'artikel_id' => 'required|exists:artikel,id',
            'isi' => 'required|string|max:1000',
        ]);

        Komentar::create([
            'user_id' => auth()->id(),
            'artikel_id' => $request->artikel_id,
            'parent_id' => $request->parent_id ?? null,
            'isi' => $request->isi,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
