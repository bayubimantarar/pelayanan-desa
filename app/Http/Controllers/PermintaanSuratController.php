<?php

namespace App\Http\Controllers;

use Mail;
use Nexmo;
use Carbon\Carbon;
use App\Models\Master\Surat;
use App\Models\Master\Pengguna;
use App\Models\PermintaanSurat;
use App\Models\Profil\Pemerintahan;
use App\Models\PermintaanSuratDetail;
use App\Models\PermintaanSuratStatus;
use App\Http\Requests\PermintaanSuratRequest;
use App\Mail\Pelayanan\PermintaanSurat as PermintaanSuratMail;

class PermintaanSuratController extends Controller
{
    /**
     *
     * Block comment
     *
     */
    public function index()
    {
        $token = csrf_token();
        $surat = Surat::all();

        return view('permintaan_surat', compact(
            'surat',
            'token'
        ));
    }

    /**
     *
     * Block comment
     *
     */
    public function send(PermintaanSuratRequest $permintaanSuratRequest)
    {
        $pendudukID = $permintaanSuratRequest->penduduk_id;
        $nik = $permintaanSuratRequest->nik;
        $nama = $permintaanSuratRequest->nama;
        $nomorTelepon = $permintaanSuratRequest->nomor_telepon;
        // $email = $PermintaanSuratRequest->email;
        $alamat = $permintaanSuratRequest->alamat;
        $surat = $permintaanSuratRequest->surat;
        $jenisUsaha = $permintaanSuratRequest->jenis_usaha;
        $lokasiUsaha = $permintaanSuratRequest->lokasi_usaha;
        $keperluanUsaha = $permintaanSuratRequest->keperluan_usaha;
        $rtSKCK = $permintaanSuratRequest->rt_skck;
        $tertanggalRTSKCK = Carbon::parse($permintaanSuratRequest->tertanggal_rt_skck);
        $rwSKCK = $permintaanSuratRequest->rw_skck;
        $tertanggalRWSKCK = Carbon::parse($permintaanSuratRequest->tertanggal_rw_skck);
        $keperluanSKCK = $permintaanSuratRequest->keperluan_skck;
        $namaGhoib = $permintaanSuratRequest->nama_ghoib;
        $tempatLahirGhoib = $permintaanSuratRequest->tempat_lahir_ghoib;
        $tanggalLahirGhoib = Carbon::parse($permintaanSuratRequest->tanggal_lahir_ghoib);
        $alamatGhoib = $permintaanSuratRequest->alamat_ghoib;
        $alasanGhoib = $permintaanSuratRequest->alasan_ghoib;
        $keperluanBersihDiri = $permintaanSuratRequest->keperluan_bersih_diri;
        $rtKehilangan = $permintaanSuratRequest->rtkehilangank;
        $tertanggalRTKehilangan = Carbon::parse($permintaanSuratRequest->tertanggal_rt_kehilangan);
        $rwKehilangan = $permintaanSuratRequest->rw_kehilangan;
        $tertanggalRWKehilangan = Carbon::parse($permintaanSuratRequest->tertanggal_rw_kehilangan);
        $alasanKehilangan = $permintaanSuratRequest->alasan_kehilangan;
        $rtIzinRame = $permintaanSuratRequest->rt_izin_rame;
        $tertanggalRTIzinRame = Carbon::parse($permintaanSuratRequest->tertanggal_rt_izin_rame);
        $rwIzinRame = $permintaanSuratRequest->rw_izin_rame;
        $tertanggalRWIzinRame = Carbon::parse($permintaanSuratRequest->tertanggal_rw_izin_rame);
        $acara = $permintaanSuratRequest->acara;
        $tanggalPelaksanaan = Carbon::parse($permintaanSuratRequest->tanggal_pelaksanaan);
        $kegiatan = $permintaanSuratRequest->kegiatan;
        $waktuPelaksanaan = $permintaanSuratRequest->waktu_pelaksanaan;
        $alamatPelaksanaan = $permintaanSuratRequest->alamat_pelaksanaan;
        $keperluanDomisili = $permintaanSuratRequest->keperluan_domisili;
        $jenis = $permintaanSuratRequest->jenis_sktm;
        $namaSKTM = $permintaanSuratRequest->nama_sktm;
        $tempatLahirSKTM = $permintaanSuratRequest->tempat_lahir_sktm;
        $tanggalLahirSKTM = Carbon::parse($permintaanSuratRequest->tanggal_lahir_sktm);
        $jenisKelaminSKTM = $permintaanSuratRequest->jenis_kelamin_sktm;
        $namaSekolah = $permintaanSuratRequest->nama_sekolah;
        $kelas = $permintaanSuratRequest->kelas;
        $jurusan = $permintaanSuratRequest->jurusan;
        $namaSekolah = $permintaanSuratRequest->nama_sekolah;
        $diwakiliOleh = $permintaanSuratRequest->diwakili_oleh;
        $alamatSekolah = $permintaanSuratRequest->alamat_sekolah;
        $keperluanSKTM = $permintaanSuratRequest->keperluan_sktm;
        $namaAnak = $permintaanSuratRequest->nama_anak;
        $tempatLahirAnak = $permintaanSuratRequest->tempat_lahir_anak;
        $tanggalLahirAnak = Carbon::parse($permintaanSuratRequest->tanggal_lahir_anak);
        $hariLahirAnak = $permintaanSuratRequest->hari_lahir_anak;
        $jamLahirAnak = Carbon::parse($permintaanSuratRequest->jam_lahir_anak);
        $jenisKelaminAnak = $permintaanSuratRequest->jenis_kelamin_anak;
        $anakKe = $permintaanSuratRequest->anak_ke;
        $alamatAnak = $permintaanSuratRequest->alamat_anak;
        $namaAyah = $permintaanSuratRequest->nama_ayah;
        $umurAyah = $permintaanSuratRequest->umur_ayah;
        $agamaAyah = $permintaanSuratRequest->agama_ayah;
        $pekerjaanAyah = $permintaanSuratRequest->pekerjaan_ayah;
        $alamatAyah = $permintaanSuratRequest->alamat_ayah;
        $namaIbu = $permintaanSuratRequest->nama_ibu;
        $umurIbu = $permintaanSuratRequest->umur_ibu;
        $agamaIbu = $permintaanSuratRequest->agama_ibu;
        $pekerjaanIbu = $permintaanSuratRequest->pekerjaan_ibu;
        $alamatIbu = $permintaanSuratRequest->alamat_ibu;
        $namaAlmarhum = $permintaanSuratRequest->nama_almarhum;
        $tempatLahirAlmarhum = $permintaanSuratRequest->tempat_lahir_almarhum;
        $tanggalLahirAlmarhum = Carbon::parse($permintaanSuratRequest->tanggal_lahir_almarhum);
        $jenisKelaminAlmarhum = $permintaanSuratRequest->jenis_kelamin_almarhum;
        $tanggalMeninggal = Carbon::parse($permintaanSuratRequest->tanggal_meninggal);
        $alamatMeninggal = $permintaanSuratRequest->alamat_meninggal;
        $penyebab = $permintaanSuratRequest->penyebab;
        $hubunganPelapor = $permintaanSuratRequest->hubungan_pelapor;
        $namaPensiun = $permintaanSuratRequest->nama_pensiun;
        $nomorPensiun = $permintaanSuratRequest->nomor_pensiun;
        $status = $permintaanSuratRequest->status;
        $tanggalMeninggalPensiun = Carbon::parse($permintaanSuratRequest->tanggal_meninggal_pensiun);
        $pensiunan = $permintaanSuratRequest->pensiunan;
        $penghasilan = $permintaanSuratRequest->penghasilan;
        $keperluanTidakBekerja = $permintaanSuratRequest->keperluan_tidak_bekerja;
        $keperluanBelumMenikah = $permintaanSuratRequest->keperluan_belum_menikah;
        $keperluanBelumMemilikiRumah = $permintaanSuratRequest->keperluan_belum_memiliki_rumah;

        $findSurat = Surat::where('keterangan', '=', $surat)->first();
        $totalPermintaanSurat = PermintaanSurat::count()+1;
        $tanggalHariIni = Carbon::now()->format('dmY');

        $kodePermintaanSurat = $findSurat->nomor_surat.''.$tanggalHariIni.''.$totalPermintaanSurat;

        $tanggalStatus = Carbon::now();


        if (substr($nomorTelepon, 0, 1) == '0'){
            $nomorTelepon = '62'.substr($nomorTelepon, 1);
        }

        $permintaanSuratData = [
            'penduduk_id' => $pendudukID,
            'kode_permintaan_surat' => $kodePermintaanSurat,
            'nik' => $nik,
            // 'nama' => $nama,
            'nomor_telepon' => $nomorTelepon,
            'surat' => $surat,
            'alamat' => $alamat,
            'status_proses' => 'Belum diproses'
        ];

        $stafDesa = Pengguna::where('jenis_pengguna', '=', 'Pelayanan')->get();

        try {
            foreach ($stafDesa as $item) {
                Mail::to($item->email)->send(new PermintaanSuratMail($item->nama));
            }

            // $message = 'Hallo, '.$nama.' Surat '.$surat.' berhasil diterima. Gunakan kode ini '.$kodePermintaanSurat.' untuk mengecek status surat.';

            // $sendMessage = Nexmo::message()->send([
            //     'to' => $nomorTelepon,
            //     'from' => 'Pelayanan',
            //     'text' => $message
            // ]);

            $createPermintaanSurat = PermintaanSurat::create($permintaanSuratData);

            if ($surat == 'Keterangan Usaha') {
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'jenis_usaha' => $jenisUsaha,
                    'lokasi_usaha' => $lokasiUsaha,
                    'keperluan_usaha' => $keperluanUsaha
                ];
            }else if($surat == 'Keterangan Catatan Kepolisian (SKCK)'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'rt_skck' => $rtSKCK,
                    'tertanggal_rt_skck' => $tertanggalRTSKCK,
                    'rw_skck' => $rwSKCK,
                    'tertanggal_rw_skck' => $tertanggalRWSKCK,
                    'keperluan_skck' => $keperluanSKCK
                ];
            }else if($surat == 'Keterangan Ghoib'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'nama_ghoib' => $namaGhoib,
                    'tempat_lahir_ghoib' => $tempatLahirGhoib,
                    'tanggal_lahir_ghoib' => $tanggalLahirGhoib,
                    'alamat_ghoib' => $alamatGhoib,
                    'alasan_ghoib' => $alasanGhoib,
                ];
            }else if($surat == 'Keterangan Bersih Diri'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'keperluan_bersih_diri' => $keperluanBersihDiri
                ];
            }else if($surat == 'Keterangan Kehilangan'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'rt_kehilangan' => $rtKehilangan,
                    'tertanggal_rt_kehilangan' => $tertanggalRTKehilangan,
                    'rw_kehilangan' => $rwKehilangan,
                    'tertanggal_rw_kehilangan' => $tertanggalRWKehilangan,
                    'alasan_kehilangan' => $alasanKehilangan
                ];
            }else if($surat == 'Keterangan Izin Rame-Rame'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'rt_izin_rame' => $rtIzinRame,
                    'tertanggal_rt_izin_rame' => $tertanggalRTIzinRame,
                    'rw_izin_rame' => $rwIzinRame,
                    'tertanggal_rw_izin_rame' => $tertanggalRWIzinRame,
                    'acara' => $acara,
                    'tanggal_pelaksanaan' => $tanggalPelaksanaan,
                    'kegiatan' => $kegiatan,
                    'waktu_pelaksanaan' => $waktuPelaksanaan,
                    'alamat_pelaksanaan' => $alamatPelaksanaan
                ];
            }else if($surat == 'Keterangan Domisili'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'keperluan_domisili' => $keperluanDomisili,
                ];
            }else if($surat == 'Keterangan Tanda Penduduk Sementara'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id
                ];
            }else if($surat == 'Keterangan Tidak Mampu'){
                if ($jenis == 'Pendidikan') {
                    $permintaanSuratDetailData = [
                        'permintaan_surat_id' => $createPermintaanSurat->id,
                        'nama_sktm' => $namaSKTM,
                        'tempat_lahir_sktm' => $tempatLahirSKTM,
                        'tanggal_lahir_sktm' => $tanggalLahirSKTM,
                        'jenis_kelamin_sktm' => $jenisKelaminSKTM,
                        'nama_sekolah' => $namaSekolah,
                        'kelas' => $kelas,
                        'jurusan' => $jurusan,
                        'alamat_sekolah' => $alamatSekolah,
                        'diwakili_oleh' => $diwakiliOleh,
                        'keperluan_sktm' => $keperluanSKTM
                    ];
                }else if($jenis == 'Kesehatan'){
                    $permintaanSuratDetailData = [
                        'permintaan_surat_id' => $createPermintaanSurat->id,
                        'keperluan_sktm' => $keperluanSKTM
                    ];
                }
            }else if($surat == 'Keterangan Kelahiran'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'nama_anak' => $namaAnak,
                    'tempat_lahir_anak' => $tempatLahirAnak,
                    'tanggal_lahir_anak' => $tanggalLahirAnak,
                    'hari_lahir_anak' => $hariLahirAnak,
                    'jam_lahir_anak' => $jamLahirAnak,
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
            }else if($surat == 'Keterangan Kematian'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'nama_almarhum' => $namaAlmarhum,
                    'tempat_lahir_almarhum' => $tempatLahirAlmarhum,
                    'tanggal_lahir_almarhum' => $tanggalLahirAlmarhum,
                    'jenis_kelamin_almarhum' => $jenisKelaminAlmarhum,
                    'tanggal_meninggal' => $tanggalMeninggal,
                    'alamat_meninggal' => $alamatMeninggal,
                    'penyebab' => $penyebab,
                    'hubungan_pelapor' => $hubunganPelapor
                ];
            }else if($surat == 'Keterangan Janda atau Duda'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'status' => $status,
                    'nama_pensiun' => $namaPensiun,
                    'nomor_pensiun' => $nomorPensiun,
                    'tanggal_meninggal_pensiun' => $tanggalMeninggalPensiun,
                    'pensiunan' => $pensiunan
                ];
            }else if($surat == 'Keterangan Penghasilan'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'penghasilan' => $penghasilan
                ];
            }else if($surat == 'Keterangan Tidak Bekerja'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'keperluan_tidak_bekerja' => $keperluanTidakBekerja
                ];
            }else if($surat == 'Keterangan Belum Menikah'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'keperluan_belum_menikah' => $keperluanBelumMenikah
                ];
            }else if($surat == 'Keterangan Belum Memiliki Rumah'){
                $permintaanSuratDetailData = [
                    'permintaan_surat_id' => $createPermintaanSurat->id,
                    'keperluan_belum_memiliki_rumah' => $keperluanBelumMemilikiRumah
                ];
            }

            $permintaanSuratStatusData = [
                'kode_permintaan_surat' => $kodePermintaanSurat,
                'tanggal_status' => $tanggalStatus,
                'status_proses' => 'Belum diproses',
                'keterangan' => 'Permintaan surat sudah diterima tetapi belum diproses.'
            ];

            $createPermintaanSuratDetail = PermintaanSuratDetail::create($permintaanSuratDetailData);
            $createPermintaanSuratStatus = PermintaanSuratStatus::create($permintaanSuratStatusData);

            return redirect('/permintaan-surat')
                ->with([
                    'status' => true,
                    'notification' => 'Permintaan surat berhasil dikirim dan selanjutnya akan dikirimkan <b>kode</b> untuk pengecekan permintaan surat via sms'
                ]);
        } catch (Exception $e) {
            return redirect('/permintaan-surat')
                ->with([
                    'status' => false,
                    'notification' => 'Permintaan surat gagal dikirim silahkan cek koneksi internet atau coba beberapa saat lagi'
                ]);
        }
    }
}
