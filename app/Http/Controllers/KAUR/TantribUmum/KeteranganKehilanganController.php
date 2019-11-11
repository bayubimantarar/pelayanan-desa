<?php

namespace App\Http\Controllers\KAUR\TantribUmum;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\KAUR\TantribUmum\KeteranganKehilangan;
use App\Http\Requests\KAUR\TantribUmum\KeteranganKehilanganRequest;

class KeteranganKehilanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $keteranganKehilangan = KeteranganKehilangan::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $datatablesKeteranganKehilangan = DataTables($keteranganKehilangan)
            ->addColumn('action', function($keteranganKehilangan){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-tantrib-dan-umum/keterangan-kehilangan/form-ubah/'.$keteranganKehilangan->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-tantrib-dan-umum/keterangan-kehilangan/surat/'.$keteranganKehilangan->id.'"
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

        return $datatablesKeteranganKehilangan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.tantrib_umum.keterangan_kehilangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::where('status', '=', '1')->get();

        return view('kaur.tantrib_umum.keterangan_kehilangan.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeteranganKehilanganRequest $keteranganKehilanganRequest)
    {
        $pendudukID = $keteranganKehilanganRequest->penduduk_id;
        $perangkatID = $keteranganKehilanganRequest->perangkat_id;
        $penggunaID = $keteranganKehilanganRequest->pengguna_id;
        $rt = $keteranganKehilanganRequest->rt;
        $rw = $keteranganKehilanganRequest->rw;
        $tertanggalRT = Carbon::parse($keteranganKehilanganRequest->tertanggal_rt);
        $tertanggalRW = Carbon::parse($keteranganKehilanganRequest->tertanggal_rw);
        $alasan = $keteranganKehilanganRequest->alasan;

        $keteranganKehilanganData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'pengguna_id' => $penggunaID,
            'rt' => $rt,
            'rw' => $rw,
            'tertanggal_rt' => $tertanggalRT,
            'tertanggal_rw' => $tertanggalRW,
            'alasan' => $alasan
        ];

        $createKeteranganKehilangan = KeteranganKehilangan::create($keteranganKehilanganData);

        return redirect('/dasbor/kaur-tantrib-dan-umum/keterangan-kehilangan')
            ->with([
                'notification' => 'Data berhasil disimpan'
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
        $keteranganKehilangan = KeteranganKehilangan::findOrFail($id);

        return view('kaur.tantrib_umum.keterangan_kehilangan.form_ubah', compact(
            'perangkat',
            'keteranganKehilangan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeteranganKehilanganRequest $keteranganKehilanganRequest, $id)
    {
        $pendudukID = $keteranganKehilanganRequest->penduduk_id;
        $perangkatID = $keteranganKehilanganRequest->perangkat_id;
        $rt = $keteranganKehilanganRequest->rt;
        $rw = $keteranganKehilanganRequest->rw;
        $tertanggalRT = Carbon::parse($keteranganKehilanganRequest->tertanggal_rt);
        $tertanggalRW = Carbon::parse($keteranganKehilanganRequest->tertanggal_rw);
        $alasan = $keteranganKehilanganRequest->alasan;

        $keteranganKehilanganData = [
            'penduduk_id' => $pendudukID,
            'perangkat_id' => $perangkatID,
            'rt' => $rt,
            'rw' => $rw,
            'tertanggal_rt' => $tertanggalRT,
            'tertanggal_rw' => $tertanggalRW,
            'alasan' => $alasan
        ];

        $createKeteranganKehilangan = KeteranganKehilangan::where('id', '=', $id)
            ->update($keteranganKehilanganData);

        return redirect('/dasbor/kaur-tantrib-dan-umum/keterangan-kehilangan')
            ->with([
                'notification' => 'Data berhasil diubah'
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
        $keteranganKehilangan = KeteranganKehilangan::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $romawi = $bulanRomawi[$keteranganKehilangan->created_at->format('m')];

        $profil = Pemerintahan::get()->first();
        $total = KeteranganKehilangan::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');
        $tertanggalRT = $keteranganKehilangan->tertanggal_rt->formatLocalized('%d %B %Y');
        $tertanggalRW = $keteranganKehilangan->tertanggal_rw->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.tantrib_umum.keterangan_kehilangan.surat', [
            'keteranganKehilangan' => $keteranganKehilangan,
            'date' => $date,
            'romawi' => $romawi,
            'profil' => $profil,
            'total' => $total,
            'tertanggalRT' => $tertanggalRT,
            'tertanggalRW' => $tertanggalRW
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
