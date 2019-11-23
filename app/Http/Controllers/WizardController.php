<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Models\Master\Pengguna;
use App\Models\Profil\Pemerintahan;

class WizardController extends Controller
{
    public function index()
    {
        $total = Pemerintahan::count();

        if ($total != 0) {
            return redirect('404');
        }

        return view('form_wizard');
    }

    public function store(Request $request)
    {
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;
        $desa = $request->desa;
        $namaKepalaDesa = $request->nama_kepala_desa;
        $emailDesa = $request->email_desa;
        $alamatDesa = $request->alamat_desa;
        $fileLogo = $request->file('logo');
        $nama = $request->nama;
        $nomorTelepon = $request->nomor_telepon;
        $alamat = $request->alamat;
        $email = $request->email;
        $password = bcrypt($request->password);

        if (!empty($fileLogo)) {
            $namaLogo = $fileLogo->getClientOriginalName();

            $uploadFile = Storage::disk('uploads')
                ->putFileAs(
                    'img',
                    $fileLogo,
                    $namaLogo
                );

            $profilData = [
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'desa' => $desa,
                'nama_kepala_desa' => $namaKepalaDesa,
                'email' => $emailDesa,
                'alamat' => $alamatDesa,
                'logo' => $namaLogo
            ];
        }else{
            $profilData = [
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'desa' => $desa,
                'nama_kepala_desa' => $namaKepalaDesa,
                'email' => $emailDesa,
                'alamat' => $alamatDesa,
                'logo' => '500x500.png'
            ];
        }

        $penggunaData = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'nomor_telepon' => $nomorTelepon,
            'alamat' => $alamat,
            'jenis_pengguna' => 'Admin'
        ];

        $createProfil = Pemerintahan::create($profilData);
        $createPengguna = Pengguna::create($penggunaData);

        return redirect('/');
    }
}
