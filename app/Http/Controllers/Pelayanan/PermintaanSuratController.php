<?php

namespace App\Http\Controllers\Pelayanan;

use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PermintaanSurat;
use App\Models\Profil\Perangkat;
use App\Models\PengambilanSurat;
use App\Http\Controllers\Controller;
use App\Models\PermintaanSuratDetail;
use App\Models\KAUR\Ekbang\KeteranganUsaha;

class PermintaanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $permintaanSurat = PermintaanSurat::orderBy('created_at', 'desc')
            ->get();

        $dataTablesPermintaanSurat = DataTables($permintaanSurat)
            ->addColumn('action', function($permintaanSurat){
                if ($permintaanSurat->status_proses == 'Belum diproses') {
                    return '
                        <center>
                            <a
                                href="/dasbor/pelayanan/permintaan-surat/form-proses/'.$permintaanSurat->id.'"
                                class="btn btn-sm btn-social btn-success"
                            >
                                <i class="fa fa-check"></i> Proses
                            </a>
                        </center>';
                }else{
                    return '
                        <center>
                            <a
                                href="/dasbor/pelayanan/permintaan-surat/form-proses/'.$permintaanSurat->id.'"
                                class="btn btn-sm btn-social btn-success disabled"
                            >
                                <i class="fa fa-check"></i> Proses
                            </a>
                        </center>';
                }

            })
            ->editColumn('status_proses', function($permintaanSurat){
                if($permintaanSurat->status_proses == 'Belum diproses'){
                    return '<center><span class="label label-default">Belum diproses</span></center>';
                }else if($permintaanSurat->status_proses == 'Sudah diproses'){
                    return '<center><span class="label label-success">Sudah diproses</span></center>';
                }
            })
            ->rawColumns(['action', 'status_proses'])
            ->toJson();

        return $dataTablesPermintaanSurat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelayanan.permintaan_surat.index');
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
        $permintaanSurat = PermintaanSurat::findOrFail($id);
        $perangkat = Perangkat::where('status', '=', '1')->get();
        $permintaanSuratDetail = PermintaanSuratDetail::where('permintaan_surat_id', '=', $id)->first();

        return view('pelayanan.permintaan_surat.form_proses', compact(
            'perangkat',
            'permintaanSurat',
            'permintaanSuratDetail'
        ));
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
        $penggunaID = $request->pengguna_id;
        $tanggalPengambilan = Carbon::parse($request->tanggal_pengambilan);
        $surat = $request->surat;

        $pendudukID = $request->penduduk_id;
        $perangkatID = $request->perangkat_id;
        $penggunaID = $request->pengguna_id;
        $redaksi = $request->redaksi;
        $jenisUsaha = $request->jenis_usaha;
        $lokasi = $request->lokasi;
        $keperluan = $request->keperluan;

        $pengambilanSuratData = [
            'permintaan_surat_id' => $id,
            'pengguna_id' => $penggunaID,
            'tanggal_pengambilan' => $tanggalPengambilan,
            'status_pengambilan' => 'Belum diambil'
        ];

        $permintaanSuratData = [
            'status_proses' => 'Sudah diproses'
        ];

        if($surat == 'Keterangan Usaha'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'redaksi' => $redaksi,
                'jenis_usaha' => $jenisUsaha,
                'lokasi' => $lokasi,
                'keperluan' => $keperluan,
            ];

            $createKeteranganUsaha = KeteranganUsaha::create($suratData);
        }

        $createPengambilanSurat = PengambilanSurat::create($pengambilanSuratData);
        $updatePermintaanSurat = PermintaanSurat::where('id', '=', $id)->update($permintaanSuratData);

        return redirect('/dasbor/pelayanan/permintaan-surat')->with([
            'notification' => 'Surat berhasil diproses'
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
