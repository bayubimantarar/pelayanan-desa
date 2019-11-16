<?php

namespace App\Http\Controllers\API\Kependudukan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kependudukan\Penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPenduduk(Request $request)
    {
        // $penduduk = Penduduk::all()->pluck('nik');

        $penduduk = Penduduk::where('nik', 'like', '%'.$request->q.'%')->get('nik');

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataNIK($nik)
    {
        $penduduk = Penduduk::where('nik', '=', $nik)->pluck('nik');

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataNama($nama)
    {
        $penduduk = Penduduk::where('nama', '=', $nama)->pluck('nama');

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdata($nik)
    {
        $penduduk = Penduduk::where('nik', '=', $nik)->first();

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataByNama($nama)
    {
        $penduduk = Penduduk::where('nama', '=', $nama)->first();

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataByID($id)
    {
        $penduduk = Penduduk::where('id', '=', $id)->first();

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
