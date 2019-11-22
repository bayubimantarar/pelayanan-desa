<?php

namespace App\Http\Controllers\Profil;

use Storage;
use Illuminate\Http\Request;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\PemerintahanRequest;

class PemerintahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemerintahan = Pemerintahan::first();

        return view('profil.pemerintahan.index', compact(
            'pemerintahan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PemerintahanRequest $pemerintahanRequest, $id)
    {
        $kabupaten = $pemerintahanRequest->kabupaten;
        $kecamatan = $pemerintahanRequest->kecamatan;
        $desa = $pemerintahanRequest->desa;
        $namaKepalaDesa = $pemerintahanRequest->nama_kepala_desa;
        $email = $pemerintahanRequest->email;
        $alamat = $pemerintahanRequest->alamat;
        $fileLogo = $pemerintahanRequest->file('logo');

        if (!empty($fileLogo)) {
            $namaLogo = $fileLogo->getClientOriginalName();

            $pemerintahan = Pemerintahan::find($id);
            $oldFileLogo = $pemerintahan->logo;

            if (!empty($oldFileLogo)) {
                $deleteFileLogo = Storage::disk('uploads')
                    ->delete('img/'.$oldFileLogo);
            }

            $data = [
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'desa' => $desa,
                'nama_kepala_desa' => $namaKepalaDesa,
                'email' => $email,
                'alamat' => $alamat,
                'logo' => $namaLogo
            ];

            $uploadFile = Storage::disk('uploads')
                ->putFileAs(
                    'img',
                    $fileLogo,
                    $namaLogo
                );
        }else{
            $data = [
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'desa' => $desa,
                'nama_kepala_desa' => $namaKepalaDesa,
                'email' => $email,
                'alamat' => $alamat
            ];
        }

        $updatePemerintahan = Pemerintahan::where('id', '=', $id)
            ->update($data);

        return redirect('/dasbor/profil/pemerintahan')
            ->with([
                'notification' => 'Data profil pemerintahan berhasil diubah.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
