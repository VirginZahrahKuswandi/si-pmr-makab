<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitator;

class FasilitatorController extends Controller
{
    public function index()
    {
        $fasilitators = Fasilitator::all();
        return view('profil-fasilitator', compact('fasilitators'));
    }
}
