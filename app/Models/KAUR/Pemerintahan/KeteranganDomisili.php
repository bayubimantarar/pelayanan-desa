<?php

namespace App\Models\KAUR\Pemerintahan;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganDomisili extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_domisili';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'pengguna_id',
        'redaksi',
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
