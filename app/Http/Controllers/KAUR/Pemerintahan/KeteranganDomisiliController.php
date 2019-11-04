<?php

namespace App\Http\Controllers\KAUR\Pemerintahan;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Pemerintahan\KeteranganDomisili;
use App\Http\Requests\KAUR\Pemerintahan\KeteranganDomisiliRequest;

class KeteranganDomisiliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganDomisili = KeteranganDomisili::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganDomisili = DataTables($keteranganDomisili)
            ->addColumn('action', function($keteranganDomisili){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-pemerintahan/keterangan-domisili/form-ubah/'.$keteranganDomisili->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-pemerintahan/keterangan-domisili/surat/'.$keteranganDomisili->id.'"
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

        return $datatablesKeteranganDomisili;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.pemerintahan.keterangan_domisili.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::where('status', '=', '1')->get();

        return view('kaur.pemerintahan.keterangan_domisili.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganDomisiliRequest $keteranganDomisiliRequest)
    {
        $pendudukID = $keteranganDomisiliRequest->penduduk_id;
        $perangkatID = $keteranganDomisiliRequest->perangkat_id;
        $penggunaID = $keteranganDomisiliRequest->pengguna_id;
        $redaksi = $keteranganDomisiliRequest->redaksi;
        $keperluan = $keteranganDomisiliRequest->keperluan;

        $keteranganDomisiliData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'redaksi' => $redaksi,
            'keperluan' => $keperluan
        ];

        $createKeteranganDomisili = KeteranganDomisili::create($keteranganDomisiliData);

        return redirect('/dasbor/kaur-pemerintahan/keterangan-domisili')
            ->with([
                'notification' => 'Data berhasil disimpan.'
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
        $perangkat = Perangkat::where('status', '=', '1')->get();
        $keteranganDomisili = KeteranganDomisili::findOrFail($id);

        return view('kaur.pemerintahan.keterangan_domisili.form_ubah', compact(
            'perangkat',
            'keteranganDomisili'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganDomisiliRequest $keteranganDomisiliRequest, $id)
    {
        $pendudukID = $keteranganDomisiliRequest->penduduk_id;
        $perangkatID = $keteranganDomisiliRequest->perangkat_id;
        $penggunaID = $keteranganDomisiliRequest->pengguna_id;
        $redaksi = $keteranganDomisiliRequest->redaksi;
        $keperluan = $keteranganDomisiliRequest->keperluan;

        $keteranganDomisiliData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'redaksi' => $redaksi,
            'keperluan' => $keperluan
        ];

        $updateKeteranganDomisili = KeteranganDomisili::where('id', '=', $id)
            ->update($keteranganDomisiliData);

        return redirect('/dasbor/kaur-pemerintahan/keterangan-domisili')
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
        $keteranganDomisili = KeteranganDomisili::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganDomisili::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.pemerintahan.keterangan_domisili.surat', [
            'keteranganDomisili' => $keteranganDomisili,
            'date' => $date,
            'profil' => $profil,
            'total' => $total
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
