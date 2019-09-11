<?php

namespace App\Http\Controllers\Autentikasi;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Autentikasi\PenggunaRequest;

class AutentikasiController extends Controller
{
    public function loginForm()
    {
        return view('autentikasi.form_login');
    }

    public function login(PenggunaRequest $penggunaRequest)
    {
        # set variable
        $email = $penggunaRequest->email;
        $password = $penggunaRequest->password;

        # set array data login
        $dataLogin = [
            'email' => $email,
            'password' => $password
        ];

        # check login
        if(Auth::guard('pengguna')->attempt($dataLogin)){
            return redirect()
                ->intended();
        }

        return redirect('/autentikasi/form-login')
            ->withErrors([
                'notification' => 'Email atau kata sandi salah.'
            ]);
    }

    public function logout(Request $request)
    {
        $logout = Auth::guard('pengguna')->logout();

        return redirect('/');
    }
}
