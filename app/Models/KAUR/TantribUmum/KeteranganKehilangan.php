<?php

namespace App\Models\KAUR\TantribUmum;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganKehilangan extends Model
{
    protected $table = 'kaur_tantrib_umum_keterangan_kehilangan';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'rt',
        'rw',
        'tertanggal_rt',
        'tertanggal_rw',
        'alasan'
    ];
    protected $dates = [
        'tertanggal_rt',
        'tertanggal_rw',
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
