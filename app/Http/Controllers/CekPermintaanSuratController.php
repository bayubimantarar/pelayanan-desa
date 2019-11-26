<?php

namespace App\Http\Controllers;

use App\Models\PermintaanSurat;
use App\Models\PermintaanSuratStatus;
use App\Http\Requests\CekPermintaanSuratRequest;

class CekPermintaanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cek_permintaan_surat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(CekPermintaanSuratRequest $cekPermintaanSuratRequest)
    {
        $kodePermintaanSurat = $cekPermintaanSuratRequest->kode_permintaan_surat;

        $permintaanSuratStatus = PermintaanSuratStatus::where('kode_permintaan_surat', '=', $kodePermintaanSurat)
            ->orderBy('created_at', 'desc')
            ->get();

        $totalPermintaanSuratStatus = $permintaanSuratStatus->count();

        return view('detail_permintaan_surat', compact(
            'permintaanSuratStatus',
            'totalPermintaanSuratStatus',
            'kodePermintaanSurat'
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
