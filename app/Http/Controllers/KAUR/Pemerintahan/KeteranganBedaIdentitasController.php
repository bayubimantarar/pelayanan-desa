<?php

namespace App\Http\Controllers\KAUR\Pemerintahan;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Pemerintahan\KeteranganBedaIdentitas;
use App\Models\KAUR\Pemerintahan\KeteranganBedaIdentitasKesalahan;
use App\Http\Requests\KAUR\Pemerintahan\KeteranganBedaIdentitasRequest;

class KeteranganBedaIdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganBedaIdentitas = KeteranganBedaIdentitas::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganBedaIdentitas = DataTables($keteranganBedaIdentitas)
            ->addColumn('action', function($keteranganBedaIdentitas){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$keteranganBedaIdentitas->id.'"
                            class="btn btn-circle btn-sm btn-warning"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a
                            href="/kaur-pemerintahan/keterangan-beda-identitas/surat/'.$keteranganBedaIdentitas->id.'"
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

        return $datatablesKeteranganBedaIdentitas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.pemerintahan.keterangan_beda_identitas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.pemerintahan.keterangan_beda_identitas.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganBedaIdentitasRequest $keteranganBedaIdentitasRequest)
    {
        $redaksi = $keteranganBedaIdentitasRequest->redaksi;
        $jumlahKesalahan = $keteranganBedaIdentitasRequest->jumlah_kesalahan;
        $masterPendudukID = $keteranganBedaIdentitasRequest->master_penduduk_id;
        $profilPerangkatID = $keteranganBedaIdentitasRequest->profil_perangkat_id;
        $redaksiTercantumAwal = $keteranganBedaIdentitasRequest->redaksi_tercantum_awal;
        $redaksiTercantumAkhir = $keteranganBedaIdentitasRequest->redaksi_tercantum_akhir;

        $keteranganBedaIdentitasData = [
            'master_penduduk_id' => $masterPendudukID,
            'profil_perangkat_id' => $profilPerangkatID,
            'redaksi_tercantum_awal' => $redaksiTercantumAwal,
            'redaksi_tercantum_akhir' => $redaksiTercantumAkhir,
            'jumlah_kesalahan' => $jumlahKesalahan,
            'redaksi' => $redaksi
        ];

        $createKeteranganBedaIdentitas = KeteranganBedaIdentitas::create($keteranganBedaIdentitasData);

        if ($jumlahKesalahan != 0) {
            for ($x=0; $x<$jumlahKesalahan; $x++) {
                $jumlahKesalahanData[] = [
                    'kaur_pemerintahan_keterangan_beda_identitas_id' => $createKeteranganBedaIdentitas->id,
                    'data' => $keteranganBedaIdentitasRequest->data[$x],
                    'keterangan' => $keteranganBedaIdentitasRequest->keterangan[$x],
                    'created_at' => Carbon::now()
                ];
            }
        }

        $createKeteranganBedaIdentitasKesalahan = KeteranganBedaIdentitasKesalahan::insert($jumlahKesalahanData);

        return redirect('/kaur-pemerintahan/keterangan-beda-identitas')
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganBedaIdentitasRequest $keteranganBedaIdentitasRequest, $id)
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
        $keteranganBedaIdentitas = KeteranganBedaIdentitas::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $jumlahKesalahan = KeteranganBedaIdentitasKesalahan::where('kaur_pemerintahan_keterangan_beda_identitas_id', '=', $id)
            ->get();

        $nomor = 1;
        $profil = Pemerintahan::get()->first();
        $total = KeteranganBedaIdentitas::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.pemerintahan.keterangan_beda_identitas.surat', [
            'date' => $date,
            'nomor' => $nomor,
            'total' => $total,
            'profil' => $profil,
            'jumlahKesalahan' => $jumlahKesalahan,
            'keteranganBedaIdentitas' => $keteranganBedaIdentitas,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
