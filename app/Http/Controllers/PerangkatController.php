<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil\Perangkat;

class PerangkatController extends Controller
{
    public function index()
    {
        $perangkat = Perangkat::orderBy('created_at', 'asc')->get();

        return view('perangkat', compact(
            'perangkat'
        ));
    }
}
