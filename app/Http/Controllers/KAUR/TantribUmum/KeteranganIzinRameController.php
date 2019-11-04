<?php

namespace App\Http\Controllers\KAUR\TantribUmum;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\TantribUmum\KeteranganIzinRame;
use App\Http\Requests\KAUR\TantribUmum\KeteranganIzinRameRequest;

class KeteranganIzinRameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganIzinRame = KeteranganIzinRame::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $dataTablesKeteranganIzinRame = DataTables($keteranganIzinRame)
            ->addColumn('action', function($keteranganIzinRame){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame/form-ubah/'.$keteranganIzinRame->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame/surat/'.$keteranganIzinRame->id.'"
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

        return $dataTablesKeteranganIzinRame;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.tantrib_umum.keterangan_izin_rame.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::where('status', '=', '1')->get();

        return view('kaur.tantrib_umum.keterangan_izin_rame.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganIzinRameRequest $keteranganIzinRameRequest)
    {
        $pendudukID = $keteranganIzinRameRequest->penduduk_id;
        $perangkatID = $keteranganIzinRameRequest->perangkat_id;
        $penggunaID = $keteranganIzinRameRequest->pengguna_id;
        $rt = $keteranganIzinRameRequest->rt;
        $rw = $keteranganIzinRameRequest->rw;
        $tertanggalRT = Carbon::parse($keteranganIzinRameRequest->tertanggal_rt);
        $tertanggalRW = Carbon::parse($keteranganIzinRameRequest->tertanggal_rw);
        $acara = $keteranganIzinRameRequest->acara;
        $tanggalPelaksanaan = Carbon::parse($keteranganIzinRameRequest->tanggal_pelaksanaan);
        $kegiatan = $keteranganIzinRameRequest->kegiatan;
        $waktuPelaksanaan = $keteranganIzinRameRequest->waktu_pelaksanaan;
        $alamatPelaksanaan = $keteranganIzinRameRequest->alamat_pelaksanaan;

        $keteranganIzinRameData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'rt' => $rt,
            'rw' => $rw,
            'tertanggal_rt' => $tertanggalRT,
            'tertanggal_rw' => $tertanggalRW,
            'acara' => $acara,
            'tanggal_pelaksanaan' => $tanggalPelaksanaan,
            'kegiatan' => $kegiatan,
            'waktu_pelaksanaan' => $waktuPelaksanaan,
            'alamat_pelaksanaan' => $alamatPelaksanaan
        ];

        $createKeteranganIzinRame = KeteranganIzinRame::create($keteranganIzinRameData);

        return redirect('/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame')
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
        $perangkat = Perangkat::where('status', '=', '1')->get();
        $keteranganIzinRame = keteranganIzinRame::findOrFail($id);

        return view('kaur.tantrib_umum.keterangan_izin_rame.form_ubah', compact(
            'perangkat',
            'keteranganIzinRame'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganIzinRameRequest $keteranganIzinRameRequest, $id)
    {
        $pendudukID = $keteranganIzinRameRequest->penduduk_id;
        $perangkatID = $keteranganIzinRameRequest->perangkat_id;
        $penggunaID = $keteranganIzinRameRequest->pengguna_id;
        $rt = $keteranganIzinRameRequest->rt;
        $rw = $keteranganIzinRameRequest->rw;
        $tertanggalRT = Carbon::parse($keteranganIzinRameRequest->tertanggal_rt);
        $tertanggalRW = Carbon::parse($keteranganIzinRameRequest->tertanggal_rw);
        $acara = $keteranganIzinRameRequest->acara;
        $tanggalPelaksanaan = Carbon::parse($keteranganIzinRameRequest->tanggal_pelaksanaan);
        $kegiatan = $keteranganIzinRameRequest->kegiatan;
        $waktuPelaksanaan = $keteranganIzinRameRequest->waktu_pelaksanaan;
        $alamatPelaksanaan = $keteranganIzinRameRequest->alamat_pelaksanaan;

        $keteranganIzinRameData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'rt' => $rt,
            'rw' => $rw,
            'tertanggal_rt' => $tertanggalRT,
            'tertanggal_rw' => $tertanggalRW,
            'acara' => $acara,
            'tanggal_pelaksanaan' => $tanggalPelaksanaan,
            'kegiatan' => $kegiatan,
            'waktu_pelaksanaan' => $waktuPelaksanaan,
            'alamat_pelaksanaan' => $alamatPelaksanaan
        ];

        $createKeteranganIzinRame = KeteranganIzinRame::where('id', '=', $id)
            ->update($keteranganIzinRameData);

        return redirect('/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame')
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
        $keteranganIzinRame = KeteranganIzinRame::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganIzinRame::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');
        $tertanggalRT = $keteranganIzinRame->tertanggal_rt->formatLocalized('%d %B %Y');
        $tertanggalRW = $keteranganIzinRame->tertanggal_rw->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.tantrib_umum.keterangan_izin_rame.surat', [
            'keteranganIzinRame' => $keteranganIzinRame,
            'date' => $date,
            'profil' => $profil,
            'total' => $total,
            'tertanggalRT' => $tertanggalRT,
            'tertanggalRW' => $tertanggalRW
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
