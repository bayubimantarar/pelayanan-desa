<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\KAUR\Kesra\SKTM;
use App\Models\Profil\Perangkat;
use App\Models\Master\JenisKelamin;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Http\Requests\KAUR\Kesra\SKTMRequest;

class SKTMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $sktm = SKTM::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesSKTM = DataTables($sktm)
            ->addColumn('action', function($sktm){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$sktm->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-kesra/sktm/surat/'.$sktm->id.'"
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

        return $datatablesSKTM;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.sktm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();
        $jenisKelamin = JenisKelamin::all();

        return view('kaur.kesra.sktm.form_tambah', compact(
            'perangkat',
            'jenisKelamin'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SKTMRequest $sktmRequest)
    {
        $nama = $sktmRequest->nama;
        $kelas = $sktmRequest->kelas;
        $jurusan = $sktmRequest->jurusan;
        $redaksi = $sktmRequest->redaksi;
        $jenis = $sktmRequest->jenis_sktm;
        $keperluan = $sktmRequest->keperluan;
        $namaSekolah = $sktmRequest->nama_sekolah;
        $tempatLahir = $sktmRequest->tempat_lahir;
        $diWakiliOleh = $sktmRequest->diwakili_oleh;
        $jenisKelamin = $sktmRequest->jenis_kelamin;
        $alamatSekolah = $sktmRequest->alamat_sekolah;
        $masterPendudukID = $sktmRequest->master_penduduk_id;
        $profilPerangkatID = $sktmRequest->profil_perangkat_id;
        $tanggalLahir = Carbon::parse($sktmRequest->tanggal_lahir);

        if ($jenis == "Pendidikan") {
            $sktmData = [
                'master_penduduk_id' => $masterPendudukID,
                'profil_perangkat_id' => $profilPerangkatID,
                'jenis_sktm' => $jenis,
                'nama' => $nama,
                'tempat_lahir' => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $jenisKelamin,
                'nama_sekolah' => $namaSekolah,
                'kelas' => $kelas,
                'jurusan' => $jurusan,
                'alamat_sekolah' => $alamatSekolah,
                'diwakili_oleh' => $diWakiliOleh,
                'redaksi' => $redaksi,
                'keperluan' => $keperluan
            ];
        }else{
            $sktmData = [
                'master_penduduk_id' => $masterPendudukID,
                'profil_perangkat_id' => $profilPerangkatID,
                'jenis_sktm' => $jenis,
                'redaksi' => $redaksi,
                'keperluan' => $keperluan
            ];
        }

        $createSKTM = SKTM::create($sktmData);

        return redirect('/kaur-kesra/sktm')
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
    public function update(SKTMRequest $sktmRequest, $id)
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
        $sktm = SKTM::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = SKTM::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.sktm.surat', [
            'sktm' => $sktm,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
