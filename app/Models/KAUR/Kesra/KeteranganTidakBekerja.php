<?php

namespace App\Models\KAUR\Kesra;

use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganTidakBekerja extends Model
{
    protected $table = 'kaur_kesra_keterangan_tidak_bekerja';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'status',
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
