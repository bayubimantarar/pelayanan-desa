<?php

namespace App\Models\KAUR\Umum;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganGhoib extends Model
{
    protected $table = 'kaur_umum_keterangan_ghoib';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'pengguna_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'redaksi',
        'alasan'
    ];
    protected $dates = [
        'tanggal_lahir'
    ];

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }
}
