<?php

namespace App\Http\Controllers\KAUR\Pemerintahan;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Pemerintahan\KeteranganKTPSementara;
use App\Http\Requests\KAUR\Pemerintahan\KeteranganKTPSementaraRequest;

class KeteranganKTPSementaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganKTPSementara = KeteranganKTPSementara::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganKTPSementara = DataTables($keteranganKTPSementara)
            ->addColumn('action', function($keteranganKTPSementara){
                return '
                    <center>
                        <a
                            href="/kaur-pemerintahan/keterangan-ktp-sementara/form-ubah/'.$keteranganKTPSementara->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-pemerintahan/keterangan-ktp-sementara/surat/'.$keteranganKTPSementara->id.'"
                            class="btn btn-sm btn-social btn-success"
                            target="_blank"
                        >
                            <i class="fa fa-file-pdf-o"></i> Cetak
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $datatablesKeteranganKTPSementara;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.pemerintahan.keterangan_ktp_sementara.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.pemerintahan.keterangan_ktp_sementara.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganKTPSementaraRequest $keteranganKTPSementaraRequest)
    {
        $pendudukID = $keteranganKTPSementaraRequest->penduduk_id;
        $perangkatID = $keteranganKTPSementaraRequest->perangkat_id;
        $redaksi = $keteranganKTPSementaraRequest->redaksi;

        $keteranganKTPSementaraData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'redaksi' => $redaksi
        ];

        $createKeteranganKTPSementara = KeteranganKTPSementara::create($keteranganKTPSementaraData);

        return redirect('/kaur-pemerintahan/keterangan-ktp-sementara')
            ->with([
                'notification' => 'Data keterangan KTP sementara berhasil disimpan.'
            ]);
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
        $perangkat = Perangkat::all();
        $keteranganKTPSementara = KeteranganKTPSementara::findOrFail($id);

        return view('kaur.pemerintahan.keterangan_ktp_sementara.form_ubah', compact(
            'perangkat',
            'keteranganKTPSementara'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganKTPSementaraRequest $keteranganKTPSementaraRequest, $id)
    {
        $pendudukID = $keteranganKTPSementaraRequest->penduduk_id;
        $perangkatID = $keteranganKTPSementaraRequest->perangkat_id;
        $redaksi = $keteranganKTPSementaraRequest->redaksi;

        $keteranganKTPSementaraData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'redaksi' => $redaksi
        ];

        $updateKeteranganKTPSementara = KeteranganKTPSementara::where('id', '=', $id)
            ->update($keteranganKTPSementaraData);

        return redirect('/kaur-pemerintahan/keterangan-ktp-sementara')
            ->with([
                'notification' => 'Data berhasil diubah.'
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function surat($id)
    {
        $keteranganKTPSementara = KeteranganKTPSementara::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganKTPSementara::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.pemerintahan.keterangan_ktp_sementara.surat', [
            'keteranganKTPSementara' => $keteranganKTPSementara,
            'date' => $date,
            'profil' => $profil,
            'total' => $total
        ]);

        return $surat->setPaper([0, 0, 638.276, 935.433], 'landscape')->stream();
    }
}
