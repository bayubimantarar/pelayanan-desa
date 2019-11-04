<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Models\Profil\Perangkat;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\PerangkatRequest;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $perangkat = Perangkat::orderBy('created_at', 'asc')
            ->get();

        $datatablesPerangkat = DataTables($perangkat)
            ->addColumn('action', function($perangkat){
                return '
                    <center>
                        <a
                            href="/dasbor/profil/perangkat/form-ubah/'.$perangkat->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            class="btn btn-sm btn-social btn-danger"
                            id="delete-button"
                            onclick="destroy('.$perangkat->id.')"
                        >
                            <i class="fa fa-times"></i> Hapus
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $datatablesPerangkat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil.perangkat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil.perangkat.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerangkatRequest $perangkatRequest)
    {
        $nama = $perangkatRequest->nama;
        $jabatan = $perangkatRequest->jabatan;
        $status = $perangkatRequest->status;

        $data = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'status' => $status
        ];

        $createPerangkat = Perangkat::create($data);

        return redirect('/dasbor/profil/perangkat')
            ->with([
                'notification' => 'Data perangkat berhasil ditambah.'
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
        $perangkat = Perangkat::findOrFail($id);

        return view('profil.perangkat.form_ubah', compact(
            'perangkat'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerangkatRequest $perangkatRequest, $id)
    {
        $nama = $perangkatRequest->nama;
        $jabatan = $perangkatRequest->jabatan;
        $status = $perangkatRequest->status;

        $data = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'status' => $status
        ];

        $updatePerangkat = Perangkat::where('id', '=', $id)
            ->update($data);

        return redirect('/dasbor/profil/perangkat')
            ->with([
                'notification' => 'Data perangkat berhasil ditambah.'
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
        $deletePerangkat = Perangkat::destroy($id);

        return response()
            ->json(200);
    }
}
