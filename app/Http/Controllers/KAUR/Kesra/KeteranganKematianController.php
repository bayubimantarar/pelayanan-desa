<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Master\JenisKelamin;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganKematian;
use App\Http\Requests\KAUR\Kesra\KeteranganKematianRequest;

class KeteranganKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganKematian = KeteranganKematian::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganKematian = DataTables($keteranganKematian)
            ->addColumn('action', function($keteranganKematian){
                return '
                    <center>
                        <a
                            href="/kaur-kesra/keterangan-kematian/form-ubah/'.$keteranganKematian->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-kesra/keterangan-kematian/surat/'.$keteranganKematian->id.'"
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

        return $datatablesKeteranganKematian;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_kematian.index');
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

        return view('kaur.kesra.keterangan_kematian.form_tambah', compact(
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
    public function store(KeteranganKematianRequest $keteranganKematianRequest)
    {
        $pendudukID = $keteranganKematianRequest->penduduk_id;
        $perangkatID = $keteranganKematianRequest->perangkat_id;
        $nama = $keteranganKematianRequest->nama;
        $tempatLahir = $keteranganKematianRequest->tempat_lahir;
        $tanggalLahir = Carbon::parse($keteranganKematianRequest->tanggal_lahir);
        $jenisKelamin = $keteranganKematianRequest->jenis_kelamin;
        $tanggalMeninggal = Carbon::parse($keteranganKematianRequest->tanggal_meninggal);
        $hariMeninggal = $keteranganKematianRequest->hari_meninggal;
        $jamMeninggal = Carbon::parse($keteranganKematianRequest->jam_meninggal);
        $alamatMeninggal = $keteranganKematianRequest->alamat_meninggal;
        $penyebabMeninggal = $keteranganKematianRequest->penyebab_meninggal;
        $hubunganPelapor = $keteranganKematianRequest->hubungan_pelapor;

        $keteranganKematianData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'nama' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'tanggal_meninggal' => $tanggalMeninggal,
            'hari_meninggal' => $hariMeninggal,
            'jam_meninggal' => $jamMeninggal,
            'alamat_meninggal' => $alamatMeninggal,
            'penyebab_meninggal' => $penyebabMeninggal,
            'hubungan_pelapor' => $hubunganPelapor
        ];

        $createKeteranganKematian = KeteranganKematian::create($keteranganKematianData);

        return redirect('/kaur-kesra/keterangan-kematian')
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
        $perangkat = Perangkat::all();
        $jenisKelamin = JenisKelamin::all();
        $keteranganKematian = KeteranganKematian::findOrFail($id);

        return view('kaur.kesra.keterangan_kematian.form_ubah', compact(
            'perangkat',
            'jenisKelamin',
            'keteranganKematian'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganKematianRequest $keteranganKematianRequest, $id)
    {
        $pendudukID = $keteranganKematianRequest->penduduk_id;
        $perangkatID = $keteranganKematianRequest->perangkat_id;
        $nama = $keteranganKematianRequest->nama;
        $tempatLahir = $keteranganKematianRequest->tempat_lahir;
        $tanggalLahir = Carbon::parse($keteranganKematianRequest->tanggal_lahir);
        $jenisKelamin = $keteranganKematianRequest->jenis_kelamin;
        $tanggalMeninggal = Carbon::parse($keteranganKematianRequest->tanggal_meninggal);
        $hariMeninggal = $keteranganKematianRequest->hari_meninggal;
        $jamMeninggal = Carbon::parse($keteranganKematianRequest->jam_meninggal);
        $alamatMeninggal = $keteranganKematianRequest->alamat_meninggal;
        $penyebabMeninggal = $keteranganKematianRequest->penyebab_meninggal;
        $hubunganPelapor = $keteranganKematianRequest->hubungan_pelapor;

        $keteranganKematianData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'nama' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'tanggal_meninggal' => $tanggalMeninggal,
            'hari_meninggal' => $hariMeninggal,
            'jam_meninggal' => $jamMeninggal,
            'alamat_meninggal' => $alamatMeninggal,
            'penyebab_meninggal' => $penyebabMeninggal,
            'hubungan_pelapor' => $hubunganPelapor
        ];

        $updateKeteranganKematian = KeteranganKematian::where('id', '=', $id)
            ->update($keteranganKematianData);

        return redirect('/kaur-kesra/keterangan-kematian')
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
        $keteranganKematian = KeteranganKematian::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganKematian::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_kematian.surat', [
            'keteranganKematian' => $keteranganKematian,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
