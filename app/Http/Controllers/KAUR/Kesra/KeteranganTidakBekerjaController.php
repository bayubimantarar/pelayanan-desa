<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganTidakBekerja;
use App\Http\Requests\KAUR\Kesra\KeteranganTidakBekerjaRequest;

class KeteranganTidakBekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganTidakBekerja = KeteranganTidakBekerja::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganTidakBekerja = DataTables($keteranganTidakBekerja)
            ->addColumn('action', function($keteranganTidakBekerja){
                return '
                    <center>
                        <a
                            href="/kaur-kesra/keterangan-tidak-bekerja/form-ubah/'.$keteranganTidakBekerja->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-kesra/keterangan-tidak-bekerja/surat/'.$keteranganTidakBekerja->id.'"
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

        return $datatablesKeteranganTidakBekerja;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_tidak_bekerja.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.kesra.keterangan_tidak_bekerja.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganTidakBekerjaRequest $keteranganTidakBekerjaRequest)
    {
        $pendudukID = $keteranganTidakBekerjaRequest->penduduk_id;
        $perangkatID = $keteranganTidakBekerjaRequest->perangkat_id;
        $status = $keteranganTidakBekerjaRequest->status;
        $keperluan = $keteranganTidakBekerjaRequest->keperluan;

        $keteranganTidakBekerjaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'status' => $status,
            'keperluan' => $keperluan
        ];

        $createKeteranganTidakBekerja = KeteranganTidakBekerja::create($keteranganTidakBekerjaData);

        return redirect('/kaur-kesra/keterangan-tidak-bekerja')
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
        $keteranganTidakBekerja = KeteranganTidakBekerja::findOrFail($id);

        return view('kaur.kesra.keterangan_tidak_bekerja.form_ubah', compact(
            'perangkat',
            'keteranganTidakBekerja'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganTidakBekerjaRequest $keteranganTidakBekerjaRequest, $id)
    {
        $pendudukID = $keteranganTidakBekerjaRequest->penduduk_id;
        $perangkatID = $keteranganTidakBekerjaRequest->perangkat_id;
        $status = $keteranganTidakBekerjaRequest->status;
        $keperluan = $keteranganTidakBekerjaRequest->keperluan;

        $keteranganTidakBekerjaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'status' => $status,
            'keperluan' => $keperluan
        ];

        $createKeteranganTidakBekerja = KeteranganTidakBekerja::where('id', '=', $id)
            ->update($keteranganTidakBekerjaData);

        return redirect('/kaur-kesra/keterangan-tidak-bekerja')
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
        $keteranganTidakBekerja = KeteranganTidakBekerja::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganTidakBekerja::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_tidak_bekerja.surat', [
            'keteranganTidakBekerja' => $keteranganTidakBekerja,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
