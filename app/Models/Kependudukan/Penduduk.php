<?php

namespace App\Models\Kependudukan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'kependudukan_penduduk';
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_perkawinan',
        'agama',
        'pendidikan',
        'pekerjaan',
        'alamat'
    ];
    protected $dates = [
        'tanggal_lahir'
    ];

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
