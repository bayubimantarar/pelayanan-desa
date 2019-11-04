<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganBelumMenikah;
use App\Http\Requests\KAUR\Kesra\KeteranganBelumMenikahRequest;

class KeteranganBelumMenikahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganBelumMenikah = KeteranganBelumMenikah::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganBelumMenikah = DataTables($keteranganBelumMenikah)
            ->addColumn('action', function($keteranganBelumMenikah){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-kesra/keterangan-belum-menikah/form-ubah/'.$keteranganBelumMenikah->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-kesra/keterangan-belum-menikah/surat/'.$keteranganBelumMenikah->id.'"
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

        return $datatablesKeteranganBelumMenikah;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_belum_menikah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::where('status', '=', '1')->get();

        return view('kaur.kesra.keterangan_belum_menikah.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganBelumMenikahRequest $keteranganBelumMenikahRequest)
    {
        $pendudukID = $keteranganBelumMenikahRequest->penduduk_id;
        $perangkatID = $keteranganBelumMenikahRequest->perangkat_id;
        $penggunaID = $keteranganBelumMenikahRequest->pengguna_id;
        $keperluan = $keteranganBelumMenikahRequest->keperluan;

        $keteranganBelumMenikahData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'keperluan' => $keperluan
        ];

        $createKeteranganBelumMenikah = KeteranganBelumMenikah::create($keteranganBelumMenikahData);

        return redirect('/dasbor/kaur-kesra/keterangan-belum-menikah')
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
        $perangkat = Perangkat::where('status', '=', '1')->get();
        $keteranganBelumMenikah = KeteranganBelumMenikah::findOrFail($id);

        return view('kaur.kesra.keterangan_belum_menikah.form_ubah', compact(
            'perangkat',
            'keteranganBelumMenikah'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganBelumMenikahRequest $keteranganBelumMenikahRequest, $id)
    {
        $pendudukID = $keteranganBelumMenikahRequest->penduduk_id;
        $perangkatID = $keteranganBelumMenikahRequest->perangkat_id;
        $penggunaID = $keteranganBelumMenikahRequest->pengguna_id;
        $keperluan = $keteranganBelumMenikahRequest->keperluan;

        $keteranganBelumMenikahData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'keperluan' => $keperluan
        ];

        $updateKeteranganBelumMenikah = KeteranganBelumMenikah::where('id', '=', $id)
            ->update($keteranganBelumMenikahData);

        return redirect('/dasbor/kaur-kesra/keterangan-belum-menikah')
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
        $keteranganBelumMenikah = KeteranganBelumMenikah::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganBelumMenikah::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_belum_menikah.surat', [
            'keteranganBelumMenikah' => $keteranganBelumMenikah,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
