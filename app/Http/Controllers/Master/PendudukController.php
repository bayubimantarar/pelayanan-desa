<?php

namespace App\Http\Controllers\Master;

use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Master\Agama;
use App\Models\Master\Penduduk;
use App\Models\Master\Pendidikan;
use App\Models\Master\JenisKelamin;
use App\Http\Controllers\Controller;
use App\Models\Master\StatusPerkawinan;
use App\Http\Requests\Master\PendudukRequest;

class PendudukController extends Controller
{
    public function APIdataNIK()
    {
        $penduduk = Penduduk::pluck('nik');

        return response()
            ->json($penduduk, 200);
    }

    public function APIdata($nik)
    {
        $penduduk = Penduduk::where('nik', '=', $nik)->first();

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $penduduk = Penduduk::orderBy('created_at', 'desc')
            ->get();

        $dataTablesPenduduk = DataTables($penduduk)
            ->addColumn('action', function($penduduk){
                return '
                    <center>
                        <a
                            href="/master/penduduk/form-ubah/'.$penduduk->id.'"
                            class="btn btn-circle btn-sm btn-warning"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a
                            href="#hapus"
                            id="delete-button"
                            class="btn btn-circle btn-sm btn-danger"
                            onclick="destroy('.$penduduk->id.')"
                        >
                            <i class="fa fa-times"></i>
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $dataTablesPenduduk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.penduduk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $jenisKelamin = jenisKelamin::all();
        $statusPerkawinan = StatusPerkawinan::all();

        return view('master.penduduk.form_tambah', compact(
            'agama',
            'pendidikan',
            'jenisKelamin',
            'statusPerkawinan'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendudukRequest $pendudukRequest)
    {
        $nik = $pendudukRequest->nik;
        $nama = $pendudukRequest->nama;
        $tempatLahir = $pendudukRequest->tempat_lahir;
        $tanggalLahir = Carbon::parse($pendudukRequest->tanggal_lahir);
        $jenisKelamin = $pendudukRequest->jenis_kelamin;
        $statusPerkawinan = $pendudukRequest->status_perkawinan;
        $agama = $pendudukRequest->agama;
        $pendidikan = $pendudukRequest->pendidikan;
        $pekerjaan = $pendudukRequest->pekerjaan;
        $alamat = $pendudukRequest->alamat;

        $pendudukData = [
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'status_perkawinan' => $statusPerkawinan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'alamat' => $alamat,
        ];

        $createPenduduk = Penduduk::create($pendudukData);

        return redirect('/master/penduduk')
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
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $jenisKelamin = jenisKelamin::all();
        $penduduk = Penduduk::findOrFail($id);
        $statusPerkawinan = StatusPerkawinan::all();

        return view('master.penduduk.form_ubah', compact(
            'agama',
            'penduduk',
            'pendidikan',
            'jenisKelamin',
            'statusPerkawinan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendudukRequest $pendudukRequest, $id)
    {
        $nik = $pendudukRequest->nik;
        $nama = $pendudukRequest->nama;
        $tempatLahir = $pendudukRequest->tempat_lahir;
        $tanggalLahir = Carbon::parse($pendudukRequest->tanggal_lahir);
        $jenisKelamin = $pendudukRequest->jenis_kelamin;
        $statusPerkawinan = $pendudukRequest->status_perkawinan;
        $agama = $pendudukRequest->agama;
        $pendidikan = $pendudukRequest->pendidikan;
        $pekerjaan = $pendudukRequest->pekerjaan;
        $alamat = $pendudukRequest->alamat;

        $pendudukData = [
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'status_perkawinan' => $statusPerkawinan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'alamat' => $alamat,
        ];

        $updatePenduduk = Penduduk::where('id', $id)
            ->update($pendudukData);

        return redirect('/master/penduduk')
            ->with([
                'notification' => 'Data penduduk berhasil diubah.'
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
        $deletePenduduk = Penduduk::destroy($id);

        return response()
            ->json(200);
    }
}
