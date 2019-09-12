<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;

class SKCK extends Model
{
    protected $table = 'kaur_umum_skck';
    protected $fillable = [
        'nik',
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
        return $this->belongsTo('App\Models\Penduduk', 'nik', 'nik');
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
