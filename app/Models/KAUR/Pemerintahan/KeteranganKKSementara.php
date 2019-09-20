<?php

namespace App\Models\KAUR\Pemerintahan;

use Illuminate\Database\Eloquent\Model;

class KeteranganKKSementara extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_kk_sementara';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'anggota_keluarga',
        'redaksi'
    ];
}
