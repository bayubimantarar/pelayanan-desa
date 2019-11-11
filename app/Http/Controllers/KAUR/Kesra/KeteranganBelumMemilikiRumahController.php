<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganBelumMemilikiRumah;
use App\Http\Requests\KAUR\Kesra\KeteranganBelumMilikiRumahRequest;

class KeteranganBelumMemilikiRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganBelumMemilikiRumah = KeteranganBelumMemilikiRumah::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganBelumMemilikiRumah = DataTables($keteranganBelumMemilikiRumah)
            ->addColumn('action', function($keteranganBelumMemilikiRumah){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-kesra/keterangan-belum-memiliki-rumah/form-ubah/'.$keteranganBelumMemilikiRumah->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-kesra/keterangan-belum-memiliki-rumah/surat/'.$keteranganBelumMemilikiRumah->id.'"
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

        return $datatablesKeteranganBelumMemilikiRumah;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_belum_memiliki_rumah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::where('status', '=', '1')->get();

        return view('kaur.kesra.keterangan_belum_memiliki_rumah.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganBelumMilikiRumahRequest $keteranganBelumMilikiRumahRequest)
    {
        $pendudukID = $keteranganBelumMilikiRumahRequest->penduduk_id;
        $perangkatID = $keteranganBelumMilikiRumahRequest->perangkat_id;
        $penggunaID = $keteranganBelumMilikiRumahRequest->pengguna_id;
        $redaksi = $keteranganBelumMilikiRumahRequest->redaksi;
        $keperluan = $keteranganBelumMilikiRumahRequest->keperluan;

        $keteranganBelumMilikiRumahData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'redaksi' => $redaksi,
            'keperluan' => $keperluan
        ];

        $createKeteranganBelumMemilikiRumah = KeteranganBelumMemilikiRumah::create($keteranganBelumMilikiRumahData);

        return redirect('/dasbor/kaur-kesra/keterangan-belum-memiliki-rumah')
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
        $keteranganBelumMemilikiRumah = KeteranganBelumMemilikiRumah::findOrFail($id);

        return view('kaur.kesra.keterangan_belum_memiliki_rumah.form_ubah', compact(
            'perangkat',
            'keteranganBelumMemilikiRumah'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganBelumMilikiRumahRequest $keteranganBelumMilikiRumahRequest, $id)
    {
        $pendudukID = $keteranganBelumMilikiRumahRequest->penduduk_id;
        $perangkatID = $keteranganBelumMilikiRumahRequest->perangkat_id;
        $penggunaID = $keteranganBelumMilikiRumahRequest->pengguna_id;
        $redaksi = $keteranganBelumMilikiRumahRequest->redaksi;
        $keperluan = $keteranganBelumMilikiRumahRequest->keperluan;

        $keteranganBelumMilikiRumahData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'redaksi' => $redaksi,
            'keperluan' => $keperluan
        ];

        $updateKeteranganBelumMemilikiRumah = KeteranganBelumMemilikiRumah::where('id', '=', $id)
            ->update($keteranganBelumMilikiRumahData);

        return redirect('/dasbor/kaur-kesra/keterangan-belum-memiliki-rumah')
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
        $keteranganBelumMemilikiRumah = KeteranganBelumMemilikiRumah::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $romawi = $bulanRomawi[$keteranganBelumMemilikiRumah->created_at->format('m')];

        $profil = Pemerintahan::get()->first();
        $total = KeteranganBelumMemilikiRumah::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_belum_memiliki_rumah.surat', [
            'keteranganBelumMemilikiRumah' => $keteranganBelumMemilikiRumah,
            'romawi' => $romawi,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
