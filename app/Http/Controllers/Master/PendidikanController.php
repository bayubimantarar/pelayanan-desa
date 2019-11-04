<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\Pendidikan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\PendidikanRequest;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $pendidikan = Pendidikan::orderBy('created_at', 'desc')
            ->get();

        $dataTablesPendidikan = DataTables($pendidikan)
            ->addColumn('action', function($pendidikan){
                return '
                    <center>
                        <a
                            href="/dasbor/master/pendidikan/form-ubah/'.$pendidikan->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            class="btn btn-sm btn-social btn-danger"
                            id="delete-button"
                            onclick="destroy('.$pendidikan->id.')"
                        >
                            <i class="fa fa-times"></i> Hapus
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $dataTablesPendidikan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.pendidikan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pendidikan.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendidikanRequest $pendidikanRequest)
    {
        $keterangan = $pendidikanRequest->keterangan;

        $data = [
            'keterangan' => $keterangan
        ];

        $createPendidikan = Pendidikan::create($data);

        return redirect('/dasbor/master/pendidikan')
            ->with([
                'notification' => 'Data pendidikan berhasil ditambah.'
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
        $pendidikan = Pendidikan::findOrFail($id);

        return view('master.pendidikan.form_ubah', compact(
            'pendidikan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendidikanRequest $pendidikanRequest, $id)
    {
        $keterangan = $pendidikanRequest->keterangan;

        $data = [
            'keterangan' => $keterangan
        ];

        $createPendidikan = Pendidikan::where('id', '=', $id)
            ->update($data);

        return redirect('/dasbor/master/pendidikan')
            ->with([
                'notification' => 'Data pendidikan berhasil diubah.'
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
        $deletePendidikan = Pendidikan::destroy($id);

        return response()
            ->json(200);
    }
}
