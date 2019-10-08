<?php

namespace App\Http\Controllers\KAUR\Umum;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Umum\KeteranganGhoib;
use App\Http\Requests\KAUR\Umum\KeteranganGhoibRequest;

class KeteranganGhoibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganGhoib = KeteranganGhoib::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $dataTablesKeteranganGhoib = DataTables($keteranganGhoib)
            ->addColumn('action', function($keteranganGhoib){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$keteranganGhoib->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-umum/keterangan-ghoib/surat/'.$keteranganGhoib->id.'"
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

        return $dataTablesKeteranganGhoib;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.umum.keterangan_ghoib.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.umum.keterangan_ghoib.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganGhoibRequest $keteranganGhoibRequest)
    {
        $pendudukID = $keteranganGhoibRequest->penduduk_id;
        $perangkatID = $keteranganGhoibRequest->perangkat_id;
        $nama = $keteranganGhoibRequest->nama;
        $tempatLahir = $keteranganGhoibRequest->tempat_lahir;
        $tanggalLahir = Carbon::parse($keteranganGhoibRequest->tanggal_lahir);
        $alamat = $keteranganGhoibRequest->alamat;
        $redaksi = $keteranganGhoibRequest->redaksi;
        $alasan = $keteranganGhoibRequest->alasan;

        $keteranganGhoibData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'nama' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamat,
            'redaksi' => $redaksi,
            'alasan' => $alasan
        ];

        $createKeteranganGhoib = KeteranganGhoib::create($keteranganGhoibData);

        return redirect('/kaur-umum/keterangan-ghoib')
            ->with([
                'notification' => 'Data keterangan ghoib berhasil ditambah.'
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
    public function update(KeteranganGhoibRequest $keteranganGhoibRequest)
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
        $keteranganGhoib = KeteranganGhoib::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganGhoib::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.umum.keterangan_ghoib.surat', [
            'keteranganGhoib' => $keteranganGhoib,
            'date' => $date,
            'profil' => $profil,
            'total' => $total,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
