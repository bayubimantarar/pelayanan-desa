<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\JenisKelamin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\JenisKelaminRequest;

class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $jenisKelamin = JenisKelamin::orderBy('created_at', 'desc')
            ->get();

        $dataTablesJenisKelamin = DataTables($jenisKelamin)
            ->addColumn('action', function($jenisKelamin){
                return '
                    <center>
                        <a
                            href="/master/jenis-kelamin/form-ubah/'.$jenisKelamin->id.'"
                            class="btn btn-circle btn-sm btn-warning"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a
                            href="#hapus"
                            id="delete-button"
                            class="btn btn-circle btn-sm btn-danger"
                            onclick="destroy('.$jenisKelamin->id.')"
                        >
                            <i class="fa fa-times"></i>
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $dataTablesJenisKelamin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.jenis_kelamin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.jenis_kelamin.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisKelaminRequest $jenisKelaminRequest)
    {
        $keterangan = $jenisKelaminRequest->keterangan;

        $data = [
            'keterangan' => $keterangan
        ];

        $createJenisKelamin = JenisKelamin::create($data);

        return redirect('/master/jenis-kelamin')
            ->with([
                'notification' => 'Data jenis kelamin berhasil ditambah.'
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
        $jenisKelamin = JenisKelamin::findOrFail($id);

        return view('master.jenis_kelamin.form_ubah', compact(
            'jenisKelamin'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JenisKelaminRequest $jenisKelaminRequest, $id)
    {
        $keterangan = $jenisKelaminRequest->keterangan;

        $data = [
            'keterangan' => $keterangan
        ];

        $createJenisKelamin = JenisKelamin::where('id', '=', $id)
            ->update($data);

        return redirect('/master/jenis-kelamin')
            ->with([
                'notification' => 'Data jenis kelamin berhasil diubah.'
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
        $deleteJenisKelamin = JenisKelamin::destroy($id);

        return response()
            ->json(200);
    }
}
