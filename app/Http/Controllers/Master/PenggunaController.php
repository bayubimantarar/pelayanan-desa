<?php

namespace App\Http\Controllers\Master;

use DataTables;
use App\Models\Master\Pengguna;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\PenggunaRequest;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $pengguna = Pengguna::orderBy('created_at', 'desc')
            ->get();

        $dataTablesPengguna = DataTables($pengguna)
            ->addColumn('action', function($pengguna){
                return '
                    <center>
                        <a
                            href="/dasbor/master/pengguna/form-ubah/'.$pengguna->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            class="btn btn-sm btn-social btn-danger"
                            id="delete-button"
                            onclick="destroy('.$pengguna->id.')"
                        >
                            <i class="fa fa-times"></i> Hapus
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $dataTablesPengguna;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pengguna.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaRequest $penggunaRequest)
    {
        $nama = $penggunaRequest->nama;
        $email = $penggunaRequest->email;
        $password = bcrypt($penggunaRequest->password);
        $nomorTelepon = $penggunaRequest->nomor_telepon;
        $alamat = $penggunaRequest->alamat;
        $jenisPengguna = $penggunaRequest->jenis_pengguna;

        $penggunaData = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'nomor_telepon' => $nomorTelepon,
            'alamat' => $alamat,
            'jenis_pengguna' => $jenisPengguna
        ];

        $createPengguna = Pengguna::create($penggunaData);

        return redirect('/dasbor/master/pengguna')
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
        $pengguna = Pengguna::findOrFail($id);

        return view('master.pengguna.form_ubah', compact(
            'pengguna'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaRequest $penggunaRequest, $id)
    {
        $nama = $penggunaRequest->nama;
        $email = $penggunaRequest->email;
        $password = bcrypt($penggunaRequest->password);
        $nomorTelepon = $penggunaRequest->nomor_telepon;
        $alamat = $penggunaRequest->alamat;
        $jenisPengguna = $penggunaRequest->jenis_pengguna;

        if (!empty($password)) {
            $penggunaData = [
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'nomor_telepon' => $nomorTelepon,
                'alamat' => $alamat,
                'jenis_pengguna' => $jenisPengguna
            ];
        }else{
            $penggunaData = [
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon' => $nomorTelepon,
                'alamat' => $alamat,
                'jenis_pengguna' => $jenisPengguna
            ];
        }

        $createPengguna = Pengguna::where('id', '=', $id)
            ->update($penggunaData);

        return redirect('/dasbor/master/pengguna')
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
        $deletePengguna = Pengguna::destroy($id);

        return response()
            ->json(200);
    }
}
