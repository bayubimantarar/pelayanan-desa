<?php

namespace App\Models\KAUR\TantribUmum;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganIzinRame extends Model
{
    protected $table = 'kaur_tantrib_umum_keterangan_izin_rame';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'rt',
        'rw',
        'tertanggal_rt',
        'tertanggal_rw',
        'acara',
        'tanggal_pelaksanaan',
        'kegiatan',
        'waktu_pelaksanaan',
        'alamat_pelaksanaan'
    ];
    protected $dates = [
        'tertanggal_rt',
        'tertanggal_rw',
        'tanggal_pelaksanaan'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }

    public function getTanggalPelaksanaanAttribute($value)
    {
        return Carbon::parse($value)->formatLocalized('%A, %d-%m-%Y');
    }
}
