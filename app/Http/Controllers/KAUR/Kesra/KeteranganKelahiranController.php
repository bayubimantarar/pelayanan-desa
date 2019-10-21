<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Master\Agama;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Models\Master\JenisKelamin;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganKelahiran;
use App\Http\Requests\KAUR\Kesra\KeteranganKelahiranRequest;

class KeteranganKelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganKelahiran = KeteranganKelahiran::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganKelahiran = DataTables($keteranganKelahiran)
            ->addColumn('action', function($keteranganKelahiran){
                return '
                    <center>
                        <a
                            href="/kaur-kesra/keterangan-kelahiran/form-ubah/'.$keteranganKelahiran->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/kaur-kesra/keterangan-kelahiran/surat/'.$keteranganKelahiran->id.'"
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

        return $datatablesKeteranganKelahiran;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_kelahiran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = Agama::all();
        $perangkat = Perangkat::all();
        $jenisKelamin = JenisKelamin::all();

        return view('kaur.kesra.keterangan_kelahiran.form_tambah', compact(
            'agama',
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
    public function store(KeteranganKelahiranRequest $keteranganKelahiranRequest)
    {
        $pendudukID = $keteranganKelahiranRequest->penduduk_id;
        $perangkatID = $keteranganKelahiranRequest->perangkat_id;
        $namaAnak = $keteranganKelahiranRequest->nama_anak;
        $tempatLahirAnak = $keteranganKelahiranRequest->tempat_lahir_anak;
        $tanggalLahirAnak = Carbon::parse($keteranganKelahiranRequest->tanggal_lahir_anak);
        $hariLahirAnak = $keteranganKelahiranRequest->hari_lahir_anak;
        $jamLahirAnak = Carbon::parse($keteranganKelahiranRequest->jam_lahir_anak);
        $jenisKelaminAnak = $keteranganKelahiranRequest->jenis_kelamin_anak;
        $anakKe = $keteranganKelahiranRequest->anak_ke;
        $alamatAnak = $keteranganKelahiranRequest->alamat_anak;
        $namaAyah = $keteranganKelahiranRequest->nama_ayah;
        $umurAyah = $keteranganKelahiranRequest->umur_ayah;
        $agamaAyah = $keteranganKelahiranRequest->agama_ayah;
        $pekerjaanAyah = $keteranganKelahiranRequest->pekerjaan_ayah;
        $alamatAyah = $keteranganKelahiranRequest->alamat_ayah;
        $namaIbu = $keteranganKelahiranRequest->nama_ibu;
        $umurIbu = $keteranganKelahiranRequest->umur_ibu;
        $agamaIbu = $keteranganKelahiranRequest->agama_ibu;
        $pekerjaanIbu = $keteranganKelahiranRequest->pekerjaan_ibu;
        $alamatIbu = $keteranganKelahiranRequest->alamat_ibu;

        $keteranganKelahiranData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'nama_anak' => $namaAnak,
            'tempat_lahir_anak' => $tempatLahirAnak,
            'tanggal_lahir_anak' => $tanggalLahirAnak,
            'hari_lahir_anak' => $hariLahirAnak,
            'jam_lahir_anak' => $jamLahirAnak,
            'jenis_kelamin_anak' => $jenisKelaminAnak,
            'anak_ke' => $anakKe,
            'alamat_anak' => $alamatAnak,
            'nama_ayah' => $namaAyah,
            'umur_ayah' => $umurAyah,
            'agama_ayah' => $agamaAyah,
            'pekerjaan_ayah' => $pekerjaanAyah,
            'alamat_ayah' => $alamatAyah,
            'nama_ibu' => $namaIbu,
            'umur_ibu' => $umurIbu,
            'agama_ibu' => $agamaIbu,
            'pekerjaan_ibu' => $pekerjaanIbu,
            'alamat_ibu' => $alamatIbu
        ];

        $createKeteranganKelahiran = KeteranganKelahiran::create($keteranganKelahiranData);

        return redirect('/kaur-kesra/keterangan-kelahiran')
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
        $agama = Agama::all();
        $perangkat = Perangkat::all();
        $jenisKelamin = JenisKelamin::all();
        $keteranganKelahiran = KeteranganKelahiran::findOrFail($id);

        return view('kaur.kesra.keterangan_kelahiran.form_ubah', compact(
            'agama',
            'perangkat',
            'jenisKelamin',
            'keteranganKelahiran'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganKelahiranRequest $keteranganKelahiranRequest, $id)
    {
        $pendudukID = $keteranganKelahiranRequest->penduduk_id;
        $perangkatID = $keteranganKelahiranRequest->perangkat_id;
        $namaAnak = $keteranganKelahiranRequest->nama_anak;
        $tempatLahirAnak = $keteranganKelahiranRequest->tempat_lahir_anak;
        $tanggalLahirAnak = Carbon::parse($keteranganKelahiranRequest->tanggal_lahir_anak);
        $hariLahirAnak = $keteranganKelahiranRequest->hari_lahir_anak;
        $jamLahirAnak = Carbon::parse($keteranganKelahiranRequest->jam_lahir_anak);
        $jenisKelaminAnak = $keteranganKelahiranRequest->jenis_kelamin_anak;
        $anakKe = $keteranganKelahiranRequest->anak_ke;
        $alamatAnak = $keteranganKelahiranRequest->alamat_anak;
        $namaAyah = $keteranganKelahiranRequest->nama_ayah;
        $umurAyah = $keteranganKelahiranRequest->umur_ayah;
        $agamaAyah = $keteranganKelahiranRequest->agama_ayah;
        $pekerjaanAyah = $keteranganKelahiranRequest->pekerjaan_ayah;
        $alamatAyah = $keteranganKelahiranRequest->alamat_ayah;
        $namaIbu = $keteranganKelahiranRequest->nama_ibu;
        $umurIbu = $keteranganKelahiranRequest->umur_ibu;
        $agamaIbu = $keteranganKelahiranRequest->agama_ibu;
        $pekerjaanIbu = $keteranganKelahiranRequest->pekerjaan_ibu;
        $alamatIbu = $keteranganKelahiranRequest->alamat_ibu;

        $keteranganKelahiranData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'nama_anak' => $namaAnak,
            'tempat_lahir_anak' => $tempatLahirAnak,
            'tanggal_lahir_anak' => $tanggalLahirAnak,
            'hari_lahir_anak' => $hariLahirAnak,
            'jam_lahir_anak' => $jamLahirAnak,
            'jenis_kelamin_anak' => $jenisKelaminAnak,
            'anak_ke' => $anakKe,
            'alamat_anak' => $alamatAnak,
            'nama_ayah' => $namaAyah,
            'umur_ayah' => $umurAyah,
            'agama_ayah' => $agamaAyah,
            'pekerjaan_ayah' => $pekerjaanAyah,
            'alamat_ayah' => $alamatAyah,
            'nama_ibu' => $namaIbu,
            'umur_ibu' => $umurIbu,
            'agama_ibu' => $agamaIbu,
            'pekerjaan_ibu' => $pekerjaanIbu,
            'alamat_ibu' => $alamatIbu
        ];

        $updateKeteranganKelahiran = KeteranganKelahiran::where('id', '=', $id)
            ->update($keteranganKelahiranData);

        return redirect('/kaur-kesra/keterangan-kelahiran')
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
        $keteranganKelahiran = KeteranganKelahiran::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganKelahiran::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_kelahiran.surat', [
            'keteranganKelahiran' => $keteranganKelahiran,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 638.276, 935.433], 'landscape')->stream();
    }
}
