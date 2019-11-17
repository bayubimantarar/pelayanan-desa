<?php

namespace App\Http\Controllers\Pelayanan;

use Nexmo;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KAUR\Umum\SKCK;
use App\Models\KAUR\Kesra\SKTM;
use App\Models\PermintaanSurat;
use App\Models\Profil\Perangkat;
use App\Models\PengambilanSurat;
use App\Models\Profil\Pemerintahan;
use App\Http\Controllers\Controller;
use App\Models\PermintaanSuratDetail;
use App\Models\KAUR\Umum\KeteranganGhoib;
use App\Models\KAUR\Ekbang\KeteranganUsaha;
use App\Models\KAUR\Kesra\KeteranganKematian;
use App\Models\KAUR\Kesra\KeteranganKelahiran;
use App\Models\KAUR\Kesra\KeteranganJandaDuda;
use App\Models\KAUR\Kesra\KeteranganPenghasilan;
use App\Models\KAUR\Kesra\KeteranganTidakBekerja;
use App\Models\KAUR\Kesra\KeteranganBelumMenikah;
use App\Models\KAUR\TantribUmum\KeteranganIzinRame;
use App\Models\KAUR\Pemerintahan\KeteranganDomisili;
use App\Models\KAUR\TantribUmum\KeteranganBersihDiri;
use App\Models\KAUR\Kesra\KeteranganBelumMemilikiRumah;

class PermintaanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $permintaanSurat = PermintaanSurat::orderBy('created_at', 'desc')->get();

        $dataTablesPermintaanSurat = DataTables($permintaanSurat)
            ->addColumn('action', function($permintaanSurat){
                if ($permintaanSurat->status_proses == 'Belum diproses') {
                    return '
                        <center>
                            <a
                                href="/dasbor/pelayanan/permintaan-surat/form-proses/'.$permintaanSurat->id.'"
                                class="btn btn-sm btn-social btn-success"
                            >
                                <i class="fa fa-check"></i> Proses
                            </a>
                        </center>';
                }else{
                    return '
                        <center>
                            <a
                                href="/dasbor/pelayanan/permintaan-surat/form-proses/'.$permintaanSurat->id.'"
                                class="btn btn-sm btn-social btn-success disabled"
                            >
                                <i class="fa fa-check"></i> Proses
                            </a>
                        </center>';
                }

            })
            ->editColumn('status_proses', function($permintaanSurat){
                if($permintaanSurat->status_proses == 'Belum diproses'){
                    return '<center><span class="label label-default">Belum diproses</span></center>';
                }else if($permintaanSurat->status_proses == 'Sudah diproses'){
                    return '<center><span class="label label-success">Sudah diproses</span></center>';
                }
            })
            ->rawColumns(['action', 'status_proses'])
            ->toJson();

        return $dataTablesPermintaanSurat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelayanan.permintaan_surat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $permintaanSurat = PermintaanSurat::findOrFail($id);
        $perangkat = Perangkat::where('status', '=', '1')->get();
        $permintaanSuratDetail = PermintaanSuratDetail::where('permintaan_surat_id', '=', $id)->first();

        return view('pelayanan.permintaan_surat.form_proses', compact(
            'perangkat',
            'permintaanSurat',
            'permintaanSuratDetail'
        ));
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
        $penggunaID = $request->pengguna_id;
        $tanggalPengambilan = Carbon::parse($request->tanggal_pengambilan);
        $namaPeminta = $request->nama_peminta;
        $nomorTelepon = $request->nomor_telepon;
        $surat = $request->surat;

        $pendudukID = $request->penduduk_id;
        $perangkatID = $request->perangkat_id;
        $penggunaID = $request->pengguna_id;
        $nama = $request->nama;
        $tempatLahir = $request->tempat_lahir;
        $tanggalLahir = Carbon::parse($request->tanggal_lahir);
        $alamat = $request->alamat;
        $alasan = $request->alasan;
        $redaksi = $request->redaksi;
        $jenisUsaha = $request->jenis_usaha;
        $lokasi = $request->lokasi;
        $keperluan = $request->keperluan;
        $rt = $request->rt;
        $rw = $request->rw;
        $tertanggalRT = Carbon::parse($request->tertanggal_rt);
        $tertanggalRW = Carbon::parse($request->tertanggal_rw);
        $tanggalPelaksanaan = Carbon::parse($request->tanggal_pelaksanaan);
        $kegiatan = $request->kegiatan;
        $acara = $request->acara;
        $waktuPelaksanaan = $request->waktu_pelaksanaan;
        $alamatPelaksanaan = $request->alamat_pelaksanaan;
        $kelas = $request->kelas;
        $jurusan = $request->jurusan;
        $jenis = $request->jenis_sktm;
        $namaSekolah = $request->nama_sekolah;
        $diWakiliOleh = $request->diwakili_oleh;
        $jenisKelamin = $request->jenis_kelamin;
        $alamatSekolah = $request->alamat_sekolah;
        $namaAnak = $request->nama_anak;
        $tempatLahirAnak = $request->tempat_lahir_anak;
        $tanggalLahirAnak = Carbon::parse($request->tanggal_lahir_anak);
        $hariLahirAnak = $request->hari_lahir_anak;
        $jamLahirAnak = Carbon::parse($request->jam_lahir_anak);
        $jenisKelaminAnak = $request->jenis_kelamin_anak;
        $anakKe = $request->anak_ke;
        $alamatAnak = $request->alamat_anak;
        $namaAyah = $request->nama_ayah;
        $umurAyah = $request->umur_ayah;
        $agamaAyah = $request->agama_ayah;
        $pekerjaanAyah = $request->pekerjaan_ayah;
        $alamatAyah = $request->alamat_ayah;
        $namaIbu = $request->nama_ibu;
        $umurIbu = $request->umur_ibu;
        $agamaIbu = $request->agama_ibu;
        $pekerjaanIbu = $request->pekerjaan_ibu;
        $alamatIbu = $request->alamat_ibu;
        $tanggalMeninggal = Carbon::parse($request->tanggal_meninggal);
        $alamatMeninggal = $request->alamat_meninggal;
        $penyebabMeninggal = $request->penyebab_meninggal;
        $hubunganPelapor = $request->hubungan_pelapor;
        $status = $request->status;
        $nomorPensiun = $request->nomor_pensiun;
        $pensiunan = $request->pensiunan;
        $penghasilan = $request->penghasilan;

        // $pengambilanSuratData = [
        //     'permintaan_surat_id' => $id,
        //     'pengguna_id' => $penggunaID,
        //     'tanggal_pengambilan' => $tanggalPengambilan,
        //     'status_pengambilan' => 'Belum diambil'
        // ];

        $permintaanSuratData = [
            // 'status_proses' => 'Sudah diproses'
        ];

        if($surat == 'Keterangan Usaha'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'redaksi' => $redaksi,
                'jenis_usaha' => $jenisUsaha,
                'lokasi' => $lokasi,
                'keperluan' => $keperluan,
            ];

            $createKeteranganUsaha = KeteranganUsaha::create($suratData);
        }else if($surat == 'Keterangan Catatan Kepolisian (SKCK)'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'rt' => $rt,
                'rw' => $rw,
                'tertanggal_rt' => $tertanggalRT,
                'tertanggal_rw' => $tertanggalRW,
                'keperluan' => $keperluan,
                'redaksi' => $redaksi
            ];

            $createSKCK = SKCK::create($suratData);
        }else if($surat == 'Keterangan Belum Memiliki Rumah'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'redaksi' => $redaksi,
                'keperluan' => $keperluan
            ];

            $createKeteranganBelumMemilikiRumah = KeteranganBelumMemilikiRumah::create($suratData);
        }else if($surat == 'Keterangan Ghoib'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'nama' => $nama,
                'tempat_lahir' => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'alamat' => $alamat,
                'redaksi' => $redaksi,
                'alasan' => $alasan
            ];

            $createKeteranganGhoib = KeteranganGhoib::create($suratData);
        }else if($surat == 'Keterangan Bersih Diri'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'redaksi' => $redaksi,
                'keperluan' => $keperluan
            ];

            $createKeteranganBersihDiri = KeteranganBersihDiri::create($suratData);
        }else if($surat == 'Keterangan Izin Rame-Rame'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'rt' => $rt,
                'rw' => $rw,
                'tertanggal_rt' => $tertanggalRT,
                'tertanggal_rw' => $tertanggalRW,
                'acara' => $acara,
                'tanggal_pelaksanaan' => $tanggalPelaksanaan,
                'kegiatan' => $kegiatan,
                'waktu_pelaksanaan' => $waktuPelaksanaan,
                'alamat_pelaksanaan' => $alamatPelaksanaan
            ];

            $createKeteranganIzinRame = KeteranganIzinRame::create($suratData);
        }else if($surat == 'Keterangan Domisili'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'redaksi' => $redaksi,
                'keperluan' => $keperluan
            ];

            $createKeteranganDomisili = KeteranganDomisili::create($suratData);
        }else if($surat == 'Keterangan Tidak Mampu'){

        if ($jenis == "Pendidikan") {
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'jenis_sktm' => $jenis,
                'nama' => $nama,
                'tempat_lahir' => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $jenisKelamin,
                'nama_sekolah' => $namaSekolah,
                'kelas' => $kelas,
                'jurusan' => $jurusan,
                'alamat_sekolah' => $alamatSekolah,
                'diwakili_oleh' => $diWakiliOleh,
                'redaksi' => $redaksi,
                'keperluan' => $keperluan
            ];
            }else{
                $suratData = [
                    'penduduk_id' => $pendudukID,
                    'perangkat_id' => $perangkatID,
                    'pengguna_id' => $penggunaID,
                    'jenis_sktm' => $jenis,
                    'redaksi' => $redaksi,
                    'keperluan' => $keperluan
                ];
            }

            $createSKTM = SKTM::create($suratData);
        }else if($surat == 'Keterangan Kelahiran'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'nama_anak' => $namaAnak,
                'tempat_lahir_anak' => $tempatLahirAnak,
                'tanggal_lahir_anak' => $tanggalLahirAnak,
                'jenis_kelamin_anak' => $jenisKelaminAnak,
                'anak_ke' => $anakKe,
                'alamat_anak' => $alamatAnak,
                'nama_ayah' => $namaAyah,
                'umur_ayah' => $umurAyah,
                'agama_ayah' => $agamaAyah,
                'pekerjaan_ayah' => $pekerjaanAyah,
                'alamat_ayah' => $alamatAyah,
                'nama_ibu' => $namaIbu,
                'umur_ibu' => $umurIbu,
                'agama_ibu' => $agamaIbu,
                'pekerjaan_ibu' => $pekerjaanIbu,
                'alamat_ibu' => $alamatIbu
            ];

            $createKeteranganKelahiran = KeteranganKelahiran::create($suratData);
        }else if($surat == 'Keterangan Kematian'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'nama' => $nama,
                'tempat_lahir' => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $jenisKelamin,
                'tanggal_meninggal' => $tanggalMeninggal,
                'alamat_meninggal' => $alamatMeninggal,
                'penyebab_meninggal' => $penyebabMeninggal,
                'hubungan_pelapor' => $hubunganPelapor
            ];

            $createKeteranganKematian = KeteranganKematian::create($suratData);
        }else if($surat == 'Keterangan Janda atau Duda'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'status' => $status,
                'nama' => $nama,
                'nomor_pensiun' => $nomorPensiun,
                'tanggal_meninggal' => $tanggalMeninggal,
                'pensiunan' => $pensiunan
            ];

            $createKeteranganJandaDuda = KeteranganJandaDuda::create($suratData);
        }else if($surat == 'Keterangan Penghasilan'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'penghasilan' => $penghasilan,
                'redaksi' => $redaksi
            ];

            $createKeteranganPenghasilan = KeteranganPenghasilan::create($suratData);
        }else if($surat == 'Keterangan Tidak Bekerja'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'status' => 'Tidak Bekerja',
                'keperluan' => $keperluan
            ];

            $createKeteranganTidakBekerja = KeteranganTidakBekerja::create($suratData);
        }else if($surat == 'Keterangan Belum Menikah'){
            $suratData = [
                'penduduk_id' => $pendudukID,
                'perangkat_id' => $perangkatID,
                'pengguna_id' => $penggunaID,
                'keperluan' => $keperluan
            ];

            $createKeteranganBelumMenikah = KeteranganBelumMenikah::create($suratData);
        }

        $pemerintahan = Pemerintahan::first();
        $createPengambilanSurat = PengambilanSurat::create($pengambilanSuratData);
        // $updatePermintaanSurat = PermintaanSurat::where('id', '=', $id)->update($permintaanSuratData);

        // $message = 'Hallo, '.$namaPeminta.' Surat '.$surat.' sudah bisa diambil pada tanggal '.$tanggalPengambilan->formatLocalized('%d/%m/%Y').'.';

        // $sendMessage = Nexmo::message()->send([
        //     'to' => $nomorTelepon,
        //     'from' => 'Pelayanan',
        //     'text' => $message
        // ]);

        return redirect('/dasbor/pelayanan/permintaan-surat')->with([
            'notification' => 'Surat berhasil diproses'
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
}
