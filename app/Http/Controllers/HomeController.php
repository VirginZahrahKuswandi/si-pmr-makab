<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class HomeController extends Controller
{
    public function index()
    {
        $daftar_artikel = Artikel::latest()->take(2)->get();

        return view('home', compact('daftar_artikel'));
    }
}
