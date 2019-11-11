<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PermintaanSuratDetail extends Model
{
    protected $table = 'permintaan_surat_detail';
    protected $fillable = [
        'permintaan_surat_id',
        'jenis_usaha',
        'lokasi_usaha',
        'keperluan_usaha',
        'rt_skck',
        'rw_skck',
        'tertanggal_rt_skck',
        'tertanggal_rw_skck',
        'keperluan_skck',
        'nama_ghoib',
        'tempat_lahir_ghoib',
        'tanggal_lahir_ghoib',
        'alamat_ghoib',
        'alasan_ghoib',
        'keperluan_bersih_diri',
        'rt_kehilangan',
        'rw_kehilangan',
        'tertanggal_rt_kehilangan',
        'tertanggal_rw_kehilangan',
        'alasan_kehilangan',
        'rt_izin_rame',
        'rw_izin_rame',
        'tertanggal_rt_izin_rame',
        'tertanggal_rw_izin_rame',
        'acara',
        'tanggal_pelaksanaan',
        'kegiatan',
        'waktu_pelaksanaan',
        'alamat_pelaksanaan',
        'keperluan_domisili',
        'jenis_sktm',
        'nama_sktm',
        'tempat_lahir_sktm',
        'tanggal_lahir_sktm',
        'jenis_kelamin_sktm',
        'nama_sekolah',
        'kelas',
        'jurusan',
        'alamat_sekolah',
        'diwakili_oleh',
        'keperluan_sktm',
        'nama_anak',
        'tempat_lahir_anak',
        'tanggal_lahir_anak',
        'jenis_kelamin_anak',
        'anak_ke',
        'alamat_anak',
        'nama_ayah',
        'umur_ayah',
        'agama_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'umur_ibu',
        'agama_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'nama_almarhum',
        'tempat_lahir_almarhum',
        'tanggal_lahir_almarhum',
        'tanggal_meninggal',
        'jenis_kelamin_almarhum',
        'alamat_meninggal',
        'penyebab',
        'hubungan_pelapor',
        'status',
        'nama_pensiun',
        'nomor_pensiun',
        'tanggal_meninggal_pensiun',
        'pensiunan',
        'penghasilan',
        'keperluan_tidak_bekerja',
        'keperluan_belum_menikah',
        'keperluan_belum_memiliki_rumah'
    ];
    protected $dates = [
        'tertanggal_rt_skck',
        'tertanggal_rw_skck',
        'tertanggal_rt_kehilangan',
        'tertanggal_rw_kehilangan',
        'tertanggal_rt_izin_rame',
        'tertanggal_rw_izin_rame',
        'tanggal_pelaksanaan',
        'tanggal_lahir_sktm',
        'tanggal_lahir_anak',
        'tanggal_lahir_almarhum',
        'tanggal_meninggal',
        'tanggal_meninggal_pensiun'
    ];

    public function getTertanggalRtSkckAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTertanggalRwSkckAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTertanggalRtIzinRameAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTertanggalRwIzinRameAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalPelaksanaanAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalLahirSktmAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalLahirAnakAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalLahirAlmarhumAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalMeninggalAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
