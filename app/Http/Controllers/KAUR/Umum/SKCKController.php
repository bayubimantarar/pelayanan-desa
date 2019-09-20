<?php

namespace App\Http\Controllers\KAUR\Umum;

use PDF;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KAUR\Umum\SKCK;
use App\Models\Profil\Perangkat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Http\Requests\KAUR\Umum\SKCKRequest;

class SKCKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $skck = SKCK::with('penduduk')
            ->orderBy('created_at', 'desc')
            ->get();

        $dataTablesSKCK = DataTables($skck)
            ->addColumn('action', function($skck){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$skck->id.'"
                            class="btn btn-circle btn-sm btn-warning"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a
                            href="/kaur-umum/skck/surat/'.$skck->id.'"
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

        return $dataTablesSKCK;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kaur.umum.skck.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();

        return view('kaur.umum.skck.form_tambah', compact(
            'perangkat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SKCKRequest $skckRequest)
    {
        $masterPendudukID = $skckRequest->master_penduduk_id;
        $profilPerangkatID = $skckRequest->profil_perangkat_id;
        $rt = $skckRequest->rt;
        $rw = $skckRequest->rw;
        $tertanggalRT = Carbon::parse($skckRequest->tertanggal_rt);
        $tertanggalRW = Carbon::parse($skckRequest->tertanggal_rw);
        $keperluan = $skckRequest->keperluan;
        $redaksi = $skckRequest->redaksi;

        $SKCKData = [
            'master_penduduk_id' => $masterPendudukID,
            'profil_perangkat_id' => $profilPerangkatID,
            'rt' => $rt,
            'rw' => $rw,
            'tertanggal_rt' => $tertanggalRT,
            'tertanggal_rw' => $tertanggalRW,
            'keperluan' => $keperluan,
            'redaksi' => $redaksi
        ];

        $createSKCK = SKCK::create($SKCKData);

        return redirect('/kaur-umum/skck')
            ->with([
                'notification' => 'Data penduduk berhasil ditambah.'
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
    public function update(Request $request, $id)
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
        $skck = SKCK::with('penduduk', 'profil_perangkat')
            ->where('id', '=', $id)
            ->first();

        $profil = Pemerintahan::get()->first();
        $total = SKCK::count();
        $date = Carbon::now()->formatLocalized('%d %B %Y');
        $tertanggalRT = $skck->tertanggal_rt->formatLocalized('%d %B %Y');
        $tertanggalRW = $skck->tertanggal_rw->formatLocalized('%d %B %Y');

        $surat = PDF::loadView('kaur.umum.skck.surat', [
            'skck' => $skck,
            'date' => $date,
            'profil' => $profil,
            'total' => $total,
            'tertanggalRT' => $tertanggalRT,
            'tertanggalRW' => $tertanggalRW
        ]);

        return $surat->setPaper([0, 0, 595.276, 935.433], 'portrait')->stream();
    }
}
