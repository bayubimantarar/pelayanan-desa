<?php

namespace App\Models\KAUR\TantribUmum;

use Carbon\Carbon;
use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class KeteranganIzinRame extends Model
{
    protected $table = 'kaur_tantrib_umum_keterangan_izin_rame';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
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
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }

    public function getTanggalPelaksanaanAttribute($value)
    {
        return Carbon::parse($value)->formatLocalized('%A, %d-%m-%Y');
    }
}
