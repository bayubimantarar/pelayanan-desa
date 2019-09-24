<?php

namespace App\Models\KAUR\Kesra;

use Illuminate\Database\Eloquent\Model;

class SKTM extends Model
{
    protected $table = 'kaur_kesra_sktm';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'jenis_sktm',
        'nama',
        'nama_sekolah',
        'kelas',
        'jurusan',
        'alamat_sekolah',
        'diwakili_oleh'
    ];
}
