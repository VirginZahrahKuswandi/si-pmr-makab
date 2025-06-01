<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::with('user');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $artikels = $query->paginate(10)->withQueryString();

        return view('artikel.index', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('artikel.show', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'slug' => 'required|string|unique:artikel,slug',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:100',
        ]);

        $artikel = new Artikel($request->all());
        $artikel->user_id = Auth::id();
        $artikel->status = $request->has('status');
        $artikel->published_at = now();

        if ($request->hasFile('gambar')) {
            $artikel->gambar = $request->file('gambar')->store('images', 'public');
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'slug' => 'required|string|unique:artikel,slug,' . $artikel->id,
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:100',
        ]);

        $artikel->fill($request->all());
        $artikel->user_id = Auth::id();
        $artikel->status = $request->has('status');
        $artikel->published_at = now();

        if ($request->hasFile('gambar')) {
            $artikel->gambar = $request->file('gambar')->store('images', 'public');
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function myArticles()
    {
        $artikels = Artikel::where('user_id', Auth::id())->paginate(10);

        return view('artikel.my-articles', compact('artikels'));
    }
}
