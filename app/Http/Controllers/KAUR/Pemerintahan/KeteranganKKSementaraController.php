<?php

namespace App\Http\Controllers\KAUR\Pemerintahan;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Pemerintahan\KeteranganKKSementara;
use App\Models\KAUR\Pemerintahan\KeteranganKKSementaraAnggota;
use App\Http\Requests\KAUR\Pemerintahan\KeteranganKKSementaraRequest;

class KeteranganKKSementaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganKKSementara = KeteranganKKSementara::with('penduduk', 'anggota_keluarga')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganKKSementara = DataTables($keteranganKKSementara)
            ->addColumn('action', function($keteranganKKSementara){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$keteranganKKSementara->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-pemerintahan/keterangan-kk-sementara/surat/'.$keteranganKKSementara->id.'"
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

        return $datatablesKeteranganKKSementara;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.pemerintahan.keterangan_kk_sementara.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.pemerintahan.keterangan_kk_sementara.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganKKSementaraRequest $keteranganKKSementaraRequest)
    {
        $pendudukID = $keteranganKKSementaraRequest->penduduk_id;
        $perangkatID = $keteranganKKSementaraRequest->perangkat_id;
        $penggunaID = $keteranganKKSementaraRequest->pengguna_id;
        $anggotaKeluarga = $keteranganKKSementaraRequest->anggota_keluarga;
        $redaksi = $keteranganKKSementaraRequest->redaksi;

        $keteranganKKSementaraData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'anggota_keluarga' => $anggotaKeluarga,
            'redaksi' => $redaksi
        ];

        $createKeteranganKKSementara = KeteranganKKSementara::create($keteranganKKSementaraData);

        if($anggotaKeluarga != 0){
            for ($x=0; $x<$anggotaKeluarga; $x++) {
                $dataAnggotaKeluarga[] = [
                    'kaur_pemerintahan_keterangan_kk_sementara_id' => $createKeteranganKKSementara->id,
                    'nik' => $keteranganKKSementaraRequest->nik[$x],
                    'nama' => $keteranganKKSementaraRequest->nama[$x],
                    'tempat_lahir' => $keteranganKKSementaraRequest->tempat_lahir[$x],
                    'tanggal_lahir' => Carbon::parse($keteranganKKSementaraRequest->tanggal_lahir[$x]),
                    'hubungan_keluarga' => $keteranganKKSementaraRequest->hubungan_keluarga[$x],
                    'created_at' => Carbon::now()
                ];
            }
        }

        $createAnggotaKeluarga = KeteranganKKSementaraAnggota::insert($dataAnggotaKeluarga);

        return redirect('/kaur-pemerintahan/keterangan-kk-sementara')
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
    public function update(KeteranganKKSementaraRequest $keteranganKKSementaraRequest, $id)
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
        $keteranganKKSementara = KeteranganKKSementara::with('penduduk', 'profil_perangkat', 'anggota_keluarga')
            ->where('id', '=', $id)
            ->first();

        $anggotaKeluarga = KeteranganKKSementaraAnggota::where('kaur_pemerintahan_keterangan_kk_sementara_id', '=', $id)
            ->get();

        $nomor = 1;
        $profil = Pemerintahan::get()->first();
        $total = KeteranganKKSementara::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.pemerintahan.keterangan_kk_sementara.surat', [
            'date' => $date,
            'nomor' => $nomor,
            'total' => $total,
            'profil' => $profil,
            'anggotaKeluarga' => $anggotaKeluarga,
            'keteranganKKSementara' => $keteranganKKSementara,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
