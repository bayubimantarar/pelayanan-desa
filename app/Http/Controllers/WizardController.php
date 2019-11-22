<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil\Pemerintahan;

class WizardController extends Controller
{
    public function index()
    {
        $total = Pemerintahan::count();

        if ($total != 0) {
            return redirect('404');
        }

        return 'Wizard';
    }
}
