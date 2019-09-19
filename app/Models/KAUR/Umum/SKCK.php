<?php

namespace App\Models\KAUR\Umum;

use Carbon\Carbon;
use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class SKCK extends Model
{
    protected $table = 'kaur_umum_skck';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'rt',
        'rw',
        'tertanggal_rt',
        'tertanggal_rw',
        'keperluan',
        'redaksi'
    ];
    protected $dates = [
        'tertanggal_rt',
        'tertanggal_rw'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }

    // public function getTertanggalRT($value)
    // {
    //     return Carbon::parse($this->tertanggal_rt)->format('d-m-Y');
    // }
    // public function getTertanggalRW($value)
    // {
    //     return Carbon::parse($this->tertanggal_rw)->format('d-m-Y');
    // }
    // public function setTertanggalRT($value)
    // {
    //     $this->attributes['tertanggal_rt'] = Carbon::parse($value)->format('Y-m-d');
    // }
    // public function setTertanggalRW($value)
    // {
    //     $this->attributes['tertanggal_rw'] = Carbon::parse($value)->format('Y-m-d');
    // }
}
