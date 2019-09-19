<?php

namespace App\Models\KAUR\TantribUmum;

use Carbon\Carbon;
use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class KeteranganBersihDiri extends Model
{
    protected $table = 'kaur_tantrib_umum_keterangan_bersih_diri';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        // 'nama_ayah',
        // 'tempat_lahir_ayah',
        // 'tanggal_lahir_ayah',
        // 'agama_ayah',
        // 'pekerjaan_ayah',
        // 'alamat_ayah',
        // 'nama_ibu',
        // 'tempat_lahir_ibu',
        // 'tanggal_lahir_ibu',
        // 'agama_ibu',
        // 'pekerjaan_ibu',
        // 'alamat_ibu',
        'redaksi',
        'keperluan'
    ];
    // protected $dates = [
    //     'tanggal_lahir_ayah',
    //     'tanggal_lahir_ibu'
    // ];

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    // public function getTanggalLahirAyahAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d-m-Y');
    // }

    // public function getTanggalLahirIbuAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d-m-Y');
    // }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }
}
