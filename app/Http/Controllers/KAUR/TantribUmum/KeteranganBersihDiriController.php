<?php

namespace App\Http\Controllers\KAUR\TantribUmum;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Master\Agama;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\TantribUmum\KeteranganBersihDiri;
use App\Http\Requests\KAUR\TantribUmum\KeteranganBersihDiriRequest;

class KeteranganBersihDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganBersihDiri = KeteranganBersihDiri::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganBersihDiri = DataTables($keteranganBersihDiri)
            ->addColumn('action', function($keteranganBersihDiri){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$keteranganBersihDiri->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-tantrib-dan-umum/keterangan-bersih-diri/surat/'.$keteranganBersihDiri->id.'"
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

        return $datatablesKeteranganBersihDiri;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.tantrib_umum.keterangan_bersih_diri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat  = Perangkat::all();
        $agama      = Agama::all();

        return view('kaur.tantrib_umum.keterangan_bersih_diri.form_tambah', compact(
            'agama',
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganBersihDiriRequest $keteranganBersihDiriRequest)
    {
        $pendudukID = $keteranganBersihDiriRequest->penduduk_id;
        $perangkatID = $keteranganBersihDiriRequest->perangkat_id;
        // $namaAyah = $keteranganBersihDiriRequest->nama_ayah;
        // $tempatLahirAyah = $keteranganBersihDiriRequest->tempat_lahir_ayah;
        // $tanggalLahirAyah = Carbon::parse($keteranganBersihDiriRequest->tanggal_lahir_ayah);
        // $agamaAyah = $keteranganBersihDiriRequest->agama_ayah;
        // $pekerjaanAyah = $keteranganBersihDiriRequest->pekerjaan_ayah;
        // $alamatAyah = $keteranganBersihDiriRequest->alamat_ayah;
        // $namaIbu = $keteranganBersihDiriRequest->nama_ibu;
        // $tempatLahirIbu = $keteranganBersihDiriRequest->tempat_lahir_ibu;
        // $tanggalLahirIbu = Carbon::parse($keteranganBersihDiriRequest->tanggal_lahir_ibu);
        // $agamaIbu = $keteranganBersihDiriRequest->agama_ibu;
        // $pekerjaanIbu = $keteranganBersihDiriRequest->pekerjaan_ibu;
        // $alamatIbu = $keteranganBersihDiriRequest->alamat_ibu;
        $redaksi = $keteranganBersihDiriRequest->redaksi;
        $keperluan = $keteranganBersihDiriRequest->keperluan;

        $keteranganBersihDiriData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            // 'nama_ayah' => $namaAyah,
            // 'tempat_lahir_ayah' => $tempatLahirAyah,
            // 'tanggal_lahir_ayah' => $tanggalLahirAyah,
            // 'agama_ayah' => $agamaAyah,
            // 'pekerjaan_ayah' => $pekerjaanAyah,
            // 'alamat_ayah' => $alamatAyah,
            // 'nama_ibu' => $namaIbu,
            // 'tempat_lahir_ibu' => $tempatLahirIbu,
            // 'tanggal_lahir_ibu' => $tanggalLahirIbu,
            // 'agama_ibu' => $agamaIbu,
            // 'pekerjaan_ibu' => $pekerjaanIbu,
            // 'alamat_ibu' => $alamatIbu,
            'redaksi' => $redaksi,
            'keperluan' => $keperluan
        ];

        $storeketeranganBersihDiri = KeteranganBersihDiri::create($keteranganBersihDiriData);

        return redirect('/kaur-tantrib-dan-umum/keterangan-bersih-diri/')
            ->with([
                'notification' => 'Data keterangan bersih diri berhasil disimpan.'
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
    public function update(KeteranganBersihDiriRequest $keteranganBersihDiriRequest, $id)
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
        $keteranganBersihDiri = KeteranganBersihDiri::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganBersihDiri::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.tantrib_umum.keterangan_bersih_diri.surat', [
            'keteranganBersihDiri' => $keteranganBersihDiri,
            'date' => $date,
            'profil' => $profil,
            'total' => $total,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
