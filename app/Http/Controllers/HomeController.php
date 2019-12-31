<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil\Pemerintahan;

class HomeController extends Controller
{
    public function index()
    {
        $pemerintahan = Pemerintahan::first();

        $misi = explode(',', $pemerintahan->misi);

        return view('index', compact(
            'misi',
            'pemerintahan'
        ));
    }
}
