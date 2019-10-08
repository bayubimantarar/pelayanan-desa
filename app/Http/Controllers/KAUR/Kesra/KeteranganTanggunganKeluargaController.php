<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Master\JenisKelamin;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganTanggunganKeluarga;
use App\Models\KAUR\Kesra\KeteranganTanggunganKeluargaAnggota;
use App\Http\Requests\KAUR\Kesra\KeteranganTanggunganKeluargaRequest;

class KeteranganTanggunganKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganTanggunganKeluarga = KeteranganTanggunganKeluarga::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganTanggunganKeluarga = DataTables($keteranganTanggunganKeluarga)
            ->addColumn('action', function($keteranganTanggunganKeluarga){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$keteranganTanggunganKeluarga->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-kesra/keterangan-tanggungan-keluarga/surat/'.$keteranganTanggunganKeluarga->id.'"
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

        return $datatablesKeteranganTanggunganKeluarga;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_tanggungan_keluarga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();
        $JenisKelamin = JenisKelamin::all();

        return view('kaur.kesra.keterangan_tanggungan_keluarga.form_tambah', compact(
            'perangkat',
            'JenisKelamin'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganTanggunganKeluargaRequest $keteranganTanggunganKeluargaRequest)
    {
        $pendudukID = $keteranganTanggunganKeluargaRequest->penduduk_id;
        $perangkatID = $keteranganTanggunganKeluargaRequest->perangkat_id;
        $anggotaKeluarga = $keteranganTanggunganKeluargaRequest->anggota_keluarga;
        $redaksi = $keteranganTanggunganKeluargaRequest->redaksi;

        $keteranganTanggunganKeluargaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'anggota_keluarga' => $anggotaKeluarga,
            'redaksi' => $redaksi
        ];

        $createKeteranganTanggunganKeluarga = KeteranganTanggunganKeluarga::create($keteranganTanggunganKeluargaData);

        if($anggotaKeluarga != 0){
            for ($x=0; $x<$anggotaKeluarga; $x++) {
                $dataAnggotaKeluarga[] = [
                    'kaur_kesra_keterangan_tanggungan_keluarga_id' => $createKeteranganTanggunganKeluarga->id,
                    'nik' => $keteranganTanggunganKeluargaRequest->nik[$x],
                    'nama' => $keteranganTanggunganKeluargaRequest->nama[$x],
                    'tempat_lahir' => $keteranganTanggunganKeluargaRequest->tempat_lahir[$x],
                    'tanggal_lahir' => Carbon::parse($keteranganTanggunganKeluargaRequest->tanggal_lahir[$x]),
                    'jenis_kelamin' => $keteranganTanggunganKeluargaRequest->jenis_kelamin[$x],
                    'hubungan_keluarga' => $keteranganTanggunganKeluargaRequest->hubungan_keluarga[$x],
                    'pekerjaan' => $keteranganTanggunganKeluargaRequest->pekerjaan[$x],
                    'created_at' => Carbon::now()
                ];
            }
        }

        $createAnggotaKeluarga = KeteranganTanggunganKeluargaAnggota::insert($dataAnggotaKeluarga);

        return redirect('/kaur-kesra/keterangan-tanggungan-keluarga')
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
    public function update(KeteranganTanggunganKeluargaRequest $keteranganTanggunganKeluargaRequest, $id)
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
        $keteranganTanggunganKeluarga = KeteranganTanggunganKeluarga::with('penduduk', 'profil_perangkat', 'anggota_keluarga')
            ->where('id', '=', $id)
            ->first();

        $anggotaKeluarga = KeteranganTanggunganKeluargaAnggota::where('kaur_kesra_keterangan_tanggungan_keluarga_id', '=', $id)
            ->get();

        $nomor = 1;
        $profil = Pemerintahan::get()->first();
        $total = KeteranganTanggunganKeluarga::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_tanggungan_keluarga.surat', [
            'date' => $date,
            'nomor' => $nomor,
            'total' => $total,
            'profil' => $profil,
            'anggotaKeluarga' => $anggotaKeluarga,
            'keteranganTanggunganKeluarga' => $keteranganTanggunganKeluarga,
        ]);

        // foreach($anggotaKeluarga as $item){
        //     echo $item->nik.'<br />';
        // }

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
