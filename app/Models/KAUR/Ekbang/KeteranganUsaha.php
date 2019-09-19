<?php

namespace App\Models\KAUR\Ekbang;

use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class KeteranganUsaha extends Model
{
    protected $table = 'kaur_ekbang_keterangan_usaha';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'redaksi',
        'jenis_usaha',
        'lokasi',
        'keperluan'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }
}
