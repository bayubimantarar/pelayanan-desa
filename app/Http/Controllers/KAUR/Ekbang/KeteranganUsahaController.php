<?php

namespace App\Http\Controllers\KAUR\Ekbang;

use PDF;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Ekbang\KeteranganUsaha;
use App\Http\Requests\KAUR\Ekbang\KeteranganUsahaRequest;

class KeteranganUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganUsaha = KeteranganUsaha::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $dataTablesKeteranganUsaha = DataTables($keteranganUsaha)
            ->addColumn('action', function($keteranganUsaha){
                return '
                    <center>
                        <a
                            href="/kaur-ekbang/keterangan-usaha/form-ubah/'.$keteranganUsaha->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-ekbang/keterangan-usaha/surat/'.$keteranganUsaha->id.'"
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

        return $dataTablesKeteranganUsaha;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.ekbang.keterangan_usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.ekbang.keterangan_usaha.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganUsahaRequest $keteranganUsahaRequest)
    {
        $pendudukID = $keteranganUsahaRequest->penduduk_id;
        $perangkatID = $keteranganUsahaRequest->perangkat_id;
        $redaksi = $keteranganUsahaRequest->redaksi;
        $jenisUsaha = $keteranganUsahaRequest->jenis_usaha;
        $lokasi = $keteranganUsahaRequest->lokasi;
        $keperluan = $keteranganUsahaRequest->keperluan;

        $keteranganUsahaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'redaksi' => $redaksi,
            'jenis_usaha' => $jenisUsaha,
            'lokasi' => $lokasi,
            'keperluan' => $keperluan,
        ];

        $createKeteranganUsaha = KeteranganUsaha::create($keteranganUsahaData);

        return redirect('/kaur-ekbang/keterangan-usaha')
            ->with([
                'notification' => 'Data penduduk berhasil ditambah.'
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
        $keteranganUsaha = KeteranganUsaha::findOrFail($id);

        return view('kaur.ekbang.keterangan_usaha.form_ubah', compact(
            'perangkat',
            'keteranganUsaha'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganUsahaRequest $keteranganUsahaRequest, $id)
    {
        $pendudukID = $keteranganUsahaRequest->penduduk_id;
        $perangkatID = $keteranganUsahaRequest->perangkat_id;
        $redaksi = $keteranganUsahaRequest->redaksi;
        $jenisUsaha = $keteranganUsahaRequest->jenis_usaha;
        $lokasi = $keteranganUsahaRequest->lokasi;
        $keperluan = $keteranganUsahaRequest->keperluan;

        $keteranganUsahaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'redaksi' => $redaksi,
            'jenis_usaha' => $jenisUsaha,
            'lokasi' => $lokasi,
            'keperluan' => $keperluan,
        ];

        $createKeteranganUsaha = KeteranganUsaha::where('id', '=', $id)
            ->update($keteranganUsahaData);

        return redirect('/kaur-ekbang/keterangan-usaha')
            ->with([
                'notification' => 'Data penduduk berhasil diubah.'
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
        $keteranganUsaha = KeteranganUsaha::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganUsaha::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.ekbang.keterangan_usaha.surat', [
            'keteranganUsaha' => $keteranganUsaha,
            'date' => $date,
            'profil' => $profil,
            'total' => $total,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
