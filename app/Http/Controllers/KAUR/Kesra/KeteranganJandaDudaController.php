<?php

namespace App\Http\Controllers\KAUR\Kesra;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\Kesra\KeteranganJandaDuda;
use App\Http\Requests\KAUR\Kesra\KeteranganJandaDudaRequest;

class KeteranganJandaDudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganJandaDuda = KeteranganJandaDuda::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganJandaDuda = DataTables($keteranganJandaDuda)
            ->addColumn('action', function($keteranganJandaDuda){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-kesra/keterangan-janda-duda/form-ubah/'.$keteranganJandaDuda->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-kesra/keterangan-janda-duda/surat/'.$keteranganJandaDuda->id.'"
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

        return $datatablesKeteranganJandaDuda;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.kesra.keterangan_janda_duda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::where('status', '=', '1')->get();

        return view('kaur.kesra.keterangan_janda_duda.form_tambah', compact(
            'perangkat',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganJandaDudaRequest $keteranganJandaDudaRequest)
    {
        $pendudukID = $keteranganJandaDudaRequest->penduduk_id;
        $perangkatID = $keteranganJandaDudaRequest->perangkat_id;
        $penggunaID = $keteranganJandaDudaRequest->pengguna_id;
        $status = $keteranganJandaDudaRequest->status;
        $nama = $keteranganJandaDudaRequest->nama;
        $nomorPensiun = $keteranganJandaDudaRequest->nomor_pensiun;
        $status = $keteranganJandaDudaRequest->status;
        $tanggalMeninggal = Carbon::parse($keteranganJandaDudaRequest->tanggal_meninggal);
        $pensiunan = $keteranganJandaDudaRequest->pensiunan;

        $keteranganJandaDudaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'status' => $status,
            'nama' => $nama,
            'nomor_pensiun' => $nomorPensiun,
            'tanggal_meninggal' => $tanggalMeninggal,
            'pensiunan' => $pensiunan
        ];

        $createKeteranganJandaDuda = KeteranganJandaDuda::create($keteranganJandaDudaData);

        return redirect('/dasbor/kaur-kesra/keterangan-janda-duda')
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
        $perangkat = Perangkat::where('status', '=', '1')->get();
        $keteranganJandaDuda = KeteranganJandaDuda::findOrFail($id);

        return view('kaur.kesra.keterangan_janda_duda.form_ubah', compact(
            'perangkat',
            'keteranganJandaDuda'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganJandaDudaRequest $keteranganJandaDudaRequest, $id)
    {
        $pendudukID = $keteranganJandaDudaRequest->penduduk_id;
        $perangkatID = $keteranganJandaDudaRequest->perangkat_id;
        $penggunaID = $keteranganJandaDudaRequest->pengguna_id;
        $status = $keteranganJandaDudaRequest->status;
        $nama = $keteranganJandaDudaRequest->nama;
        $nomorPensiun = $keteranganJandaDudaRequest->nomor_pensiun;
        $status = $keteranganJandaDudaRequest->status;
        $tanggalMeninggal = Carbon::parse($keteranganJandaDudaRequest->tanggal_meninggal);
        $pensiunan = $keteranganJandaDudaRequest->pensiunan;

        $keteranganJandaDudaData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'status' => $status,
            'nama' => $nama,
            'nomor_pensiun' => $nomorPensiun,
            'tanggal_meninggal' => $tanggalMeninggal,
            'pensiunan' => $pensiunan
        ];

        $createKeteranganJandaDuda = KeteranganJandaDuda::where('id', '=', $id)
            ->update($keteranganJandaDudaData);

        return redirect('/dasbor/kaur-kesra/keterangan-janda-duda')
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
        $keteranganJandaDuda = KeteranganJandaDuda::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = KeteranganJandaDuda::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.kesra.keterangan_janda_duda.surat', [
            'keteranganJandaDuda' => $keteranganJandaDuda,
            'date' => $date,
            'total' => $total,
            'profil' => $profil,
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
