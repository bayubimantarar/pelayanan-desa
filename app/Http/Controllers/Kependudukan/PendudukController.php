<?php

namespace App\Http\Controllers\Kependudukan;

use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Master\Agama;
use App\Models\Master\Pendidikan;
use App\Models\Master\JenisKelamin;
use App\Http\Controllers\Controller;
use App\Models\Kependudukan\Penduduk;
use App\Models\Master\StatusPerkawinan;
use App\Http\Requests\Kependudukan\PendudukRequest;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPenduduk(Request $request)
    {
        $penduduk = Penduduk::where('nik', 'like', '%'.$request->q.'%')->get('nik');

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataNIK($nik)
    {
        $penduduk = Penduduk::where('nik', '=', $nik)->pluck('nik');

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataNama($nama)
    {
        $penduduk = Penduduk::where('nama', '=', $nama)->pluck('nama');

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function APIdataByNama($nama)
    {
        $penduduk = Penduduk::where('nama', '=', $nama)->first();

        return response()
            ->json($penduduk, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function APIdataByID($id)
    {
        $penduduk = Penduduk::where('id', '=', $id)->first();

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
                            href="/dasbor/kependudukan/penduduk/form-ubah/'.$penduduk->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            class="btn btn-sm btn-social btn-danger"
                            id="delete-button"
                            onclick="destroy('.$penduduk->id.')"
                        >
                            <i class="fa fa-times"></i> Hapus
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
        return view('kependudukan.penduduk.index');
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

        return view('kependudukan.penduduk.form_tambah', compact(
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

        return redirect('/dasbor/kependudukan/penduduk')
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
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $jenisKelamin = jenisKelamin::all();
        $penduduk = Penduduk::findOrFail($id);
        $statusPerkawinan = StatusPerkawinan::all();

        return view('kependudukan.penduduk.form_ubah', compact(
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

        return redirect('/dasbor/kependudukan/penduduk')
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
        $deletePenduduk = Penduduk::destroy($id);

        return response()
            ->json(200);
    }
}
