<?php

namespace App\Models\KAUR\TantribUmum;

use Carbon\Carbon;
use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class KeteranganKehilangan extends Model
{
    protected $table = 'kaur_tantrib_umum_keterangan_kehilangan';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
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
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }
}
