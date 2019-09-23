<?php

namespace App\Models\KAUR\Pemerintahan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class KeteranganKKSementaraAnggota extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_kk_sementara_anggota';
    protected $fillable = [
        'kaur_pemerintahan_keterangan_kk_sementara_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'hubungan_keluarga'
    ];
    protected $dates = [
        'tanggal_lahir'
    ];

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
