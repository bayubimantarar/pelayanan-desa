<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use Terbilang;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Profil\Perangkat;
use App\Models\Master\JenisKelamin;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganPenghasilan;
use App\Http\Requests\KAUR\Kesra\KeteranganPenghasilanRequest;

class KeteranganPenghasilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganPenghasilan = KeteranganPenghasilan::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganPenghasilan = DataTables($keteranganPenghasilan)
            ->addColumn('action', function($keteranganPenghasilan){
                return '
                    <center>
                        <a
                            href="/kaur-kesra/keterangan-penghasilan/form-ubah/'.$keteranganPenghasilan->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-kesra/keterangan-penghasilan/surat/'.$keteranganPenghasilan->id.'"
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

        return $datatablesKeteranganPenghasilan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_penghasilan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.kesra.keterangan_penghasilan.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganPenghasilanRequest $keteranganPenghasilanRequest)
    {
        $pendudukID = $keteranganPenghasilanRequest->penduduk_id;
        $perangkatID = $keteranganPenghasilanRequest->perangkat_id;
        $penggunaID = $keteranganPenghasilanRequest->pengguna_id;
        $penghasilan = $keteranganPenghasilanRequest->penghasilan;
        $redaksi = $keteranganPenghasilanRequest->redaksi;

        $keteranganPenghasilanData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'penghasilan' => $penghasilan,
            'redaksi' => $redaksi
        ];

        $createKeteranganPenghasilan = KeteranganPenghasilan::create($keteranganPenghasilanData);

        return redirect('/kaur-kesra/keterangan-penghasilan')
            ->with([
                'notification' => 'Data berhasil ditambah.'
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
        $keteranganPenghasilan = KeteranganPenghasilan::findOrFail($id);

        return view('kaur.kesra.keterangan_penghasilan.form_ubah', compact(
            'perangkat',
            'keteranganPenghasilan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganPenghasilanRequest $keteranganPenghasilanRequest, $id)
    {
        $pendudukID = $keteranganPenghasilanRequest->penduduk_id;
        $perangkatID = $keteranganPenghasilanRequest->perangkat_id;
        $penggunaID = $keteranganPenghasilanRequest->pengguna_id;
        $penghasilan = $keteranganPenghasilanRequest->penghasilan;
        $redaksi = $keteranganPenghasilanRequest->redaksi;

        $keteranganPenghasilanData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'penghasilan' => $penghasilan,
            'redaksi' => $redaksi
        ];

        $updateKeteranganPenghasilan = KeteranganPenghasilan::where('id', '=', $id)
            ->update($keteranganPenghasilanData);

        return redirect('/kaur-kesra/keterangan-penghasilan')
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
        $keteranganPenghasilan = KeteranganPenghasilan::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganPenghasilan::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_penghasilan.surat', [
            'keteranganPenghasilan' => $keteranganPenghasilan,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
