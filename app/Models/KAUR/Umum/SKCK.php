<?php

namespace App\Models\KAUR\Umum;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class SKCK extends Model
{
    protected $table = 'kaur_umum_skck';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
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
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }

    public function getTertanggalRtEditAttribute($value)
    {
        return Carbon::parse($this->tertanggal_rt)->format('d-m-Y');
    }

    public function getTertanggalRwEditAttribute($value)
    {
        return Carbon::parse($this->tertanggal_rw)->format('d-m-Y');
    }

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
