<?php

namespace App\Http\Controllers\Pelayanan;

use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PengambilanSurat;
use App\Http\Controllers\Controller;

class PengambilanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $pengambilanSurat = PengambilanSurat::with('permintaan_surat')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatTablesPengambilanSurat = DataTables($pengambilanSurat)
            ->addColumn('action', function($pengambilanSurat){
                if ($pengambilanSurat->status_pengambilan == 'Belum diambil') {
                    return '
                        <center>
                            <a
                                href="/dasbor/pelayanan/pengambilan-surat/proses/'.$pengambilanSurat->id.'"
                                class="btn btn-sm btn-social btn-success"
                            >
                                <i class="fa fa-check"></i> Proses
                            </a>
                        </center>';
                }else{
                    return '
                        <center>
                            <a
                                href="/dasbor/pelayanan/pengambilan-surat/proses/'.$pengambilanSurat->id.'"
                                class="btn btn-sm btn-social btn-success disabled"
                            >
                                <i class="fa fa-check"></i> Proses
                            </a>
                        </center>';
                }

            })
            ->editColumn('status_pengambilan', function($pengambilanSurat){
                if($pengambilanSurat->status_pengambilan == 'Belum diambil'){
                    return '<center><span class="label label-default">Belum diambil</span></center>';
                }else if($pengambilanSurat->status_pengambilan == 'Sudah diambil'){
                    return '<center><span class="label label-success">Sudah diambil</span></center>';
                }
            })
            ->rawColumns(['action', 'status_pengambilan'])
            ->toJson();

        return $datatTablesPengambilanSurat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelayanan.pengambilan_surat.index');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proses($id)
    {
        $tanggalPengambilan = Carbon::now();

        $data = [
            'tanggal_pengambilan' => $tanggalPengambilan,
            'status_pengambilan' => 'Sudah diambil'
        ];

        $updatePengambilanSurat = PengambilanSurat::where('id', '=', $id)
            ->update($data);

        return redirect('/dasbor/pelayanan/pengambilan-surat')->with([
            'notification' => 'Data berhasil diproses'
        ]);
    }
}
