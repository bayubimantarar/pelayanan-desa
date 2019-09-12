<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\SKCK;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
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
