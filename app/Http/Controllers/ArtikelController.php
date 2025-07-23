<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;
use App\Models\ArtikelFoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helpers\SlugHelper;


class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::with(['user', 'fotos']) // ✅ tambahkan 'fotos'
            ->where('status', true);


        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $artikels = $query->paginate(10)->withQueryString();

        return view('artikel.index', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::with(['user', 'fotos'])
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

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
            // slug dihapus dari validasi karena auto generate
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'kategori' => 'nullable|string|max:100',
        ]);

        $artikel = new Artikel($request->all());
        $artikel->user_id = Auth::id();
        $artikel->status = $request->has('status');
        $artikel->published_at = now();

        // Generate slug otomatis dari judul
        $artikel->slug = Str::slug($request->judul);

        // Jika slug sudah ada di DB, buat slug unik
        $count = Artikel::where('slug', 'LIKE', "{$artikel->slug}%")->count();
        if ($count > 0) {
            $artikel->slug .= '-' . ($count + 1);
        }

        if ($request->hasFile('gambar')) {
            $artikel->gambar = $request->file('gambar')->store('images', 'public');
        }

        $artikel->save();

        // Simpan galeri foto jika ada (jika sudah kamu tambahkan di form)
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $foto) {
                $path = $foto->store('galeri', 'public');
                $artikel->fotos()->create(['path' => $path]);
            }
        }

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat.');
    }


    public function edit($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('user_id', Auth::id())->firstOrFail();
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        // Validasi (bisa kamu sesuaikan)
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|max:10240', // max 2MB
            'galeri.*' => 'nullable|image|max:10240', // max 5MB per gambar
        ]);

        // Update data artikel
        $artikel->judul = $request->judul;
        $artikel->konten = $request->konten;

        // Set status artikel menjadi false
        $artikel->status = false;

        if ($artikel->isDirty('judul')) {
            $artikel->slug = \App\Helpers\SlugHelper::generateUniqueSlug($request->judul, Artikel::class, 'slug', $artikel->id);
        }

        // Handle gambar utama baru (jika ada)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('gambar-artikel', 'public');
            $artikel->gambar = $path;
        }

        $artikel->save();

        // Handle upload galeri baru (jika ada)
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('galeri-artikel', 'public');

                    // Simpan data galeri di tabel foto/artikel terkait
                    // Contoh: artikel punya relasi fotos (one to many)
                    $artikel->fotos()->create([
                        'path' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('artikel.index', $artikel->slug)->with('success', 'Artikel berhasil diperbarui.');
    }


    public function deleteFoto($id)
    {
        $foto = ArtikelFoto::findOrFail($id);
        if (Storage::exists($foto->path)) {
            Storage::delete($foto->path);
        }
        $foto->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }


    public function destroy($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('user_id', Auth::id())->firstOrFail();
        $artikel->delete();

        return redirect()->route('profil')->with('success', 'Artikel berhasil dihapus.');
    }
}
