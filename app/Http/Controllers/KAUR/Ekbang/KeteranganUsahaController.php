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
                            href="/master/penduduk/form-ubah/'.$keteranganUsaha->id.'"
                            class="btn btn-circle btn-sm btn-warning"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a
                            href="/kaur-ekbang/keterangan-usaha/surat/'.$keteranganUsaha->id.'"
                            class="btn btn-circle btn-sm btn-success"
                            target="_blank"
                        >
                            <i class="fa fa-file-pdf-o"></i>
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
        $masterPendudukID = $keteranganUsahaRequest->master_penduduk_id;
        $profilPerangkatID = $keteranganUsahaRequest->profil_perangkat_id;
        $redaksi = $keteranganUsahaRequest->redaksi;
        $jenisUsaha = $keteranganUsahaRequest->jenis_usaha;
        $lokasi = $keteranganUsahaRequest->lokasi;
        $keperluan = $keteranganUsahaRequest->keperluan;

        $keteranganUsahaData = [
            'master_penduduk_id' => $masterPendudukID,
            'profil_perangkat_id' => $profilPerangkatID,
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
