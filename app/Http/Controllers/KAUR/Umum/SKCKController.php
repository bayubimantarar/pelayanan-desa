<?php

namespace App\Http\Controllers\KAUR\Umum;

use PDF;
use DataTables;
use Carbon\Carbon;
use App\Models\SKCK;
use Illuminate\Http\Request;
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
        return view('kaur.umum.skck.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SKCKRequest $skckRequest)
    {
        $nik = $skckRequest->nik;
        $rt = $skckRequest->rt;
        $rw = $skckRequest->rw;
        $tertanggalRT = Carbon::parse($skckRequest->tertanggal_rt);
        $tertanggalRW = Carbon::parse($skckRequest->tertanggal_rw);
        $keperluan = $skckRequest->keperluan;
        $redaksi = $skckRequest->redaksi;

        $SKCKData = [
            'nik' => $nik,
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
        $skck = SKCK::with('penduduk')
            ->where('id', '=', $id)
            ->first();

        $surat = PDF::loadView('kaur.umum.skck.surat', [
            'skck' => $skck
        ]);

        return $surat->setPaper('a4', 'portrait')->stream();
    }
}
