<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil\Pemerintahan;

class HomeController extends Controller
{
    public function index()
    {
        $pemerintahan = Pemerintahan::first();

        return view('index', compact(
            'pemerintahan'
        ));
    }
}
