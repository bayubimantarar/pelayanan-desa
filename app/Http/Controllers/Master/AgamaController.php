<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\AgamaRequest;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $agama = Agama::orderBy('created_at', 'desc')
            ->get();

        $dataTablesAgama = DataTables($agama)
            ->addColumn('action', function($agama){
                return '
                    <center>
                        <a
                            href="/master/agama/form-ubah/'.$agama->id.'"
                            class="btn btn-circle btn-sm btn-warning"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a
                            href="#hapus"
                            id="delete-button"
                            class="btn btn-circle btn-sm btn-danger"
                            onclick="destroy('.$agama->id.')"
                        >
                            <i class="fa fa-times"></i>
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $dataTablesAgama;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.agama.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.agama.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgamaRequest $agamaRequest)
    {
        $keterangan = $agamaRequest->keterangan;

        $data = [
            'keterangan' => $keterangan
        ];

        $createAgama = Agama::create($data);

        return redirect('/master/agama')
            ->with([
                'notification' => 'Data agama berhasil ditambah.'
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
        $agama = Agama::findOrFail($id);

        return view('master.agama.form_ubah', compact(
            'agama'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgamaRequest $agamaRequest, $id)
    {
        $keterangan = $agamaRequest->keterangan;

        $data = [
            'keterangan' => $keterangan
        ];

        $createAgama = Agama::where('id', '=', $id)
            ->update($data);

        return redirect('/master/agama')
            ->with([
                'notification' => 'Data agama berhasil diubah.'
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
        $deleteAgama = Agama::destroy($id);

        return response()
            ->json(200);
    }
}
