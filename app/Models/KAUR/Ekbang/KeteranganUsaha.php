<?php

namespace App\Models\KAUR\Ekbang;

use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganUsaha extends Model
{
    protected $table = 'kaur_ekbang_keterangan_usaha';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'redaksi',
        'jenis_usaha',
        'lokasi',
        'keperluan'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }
}
