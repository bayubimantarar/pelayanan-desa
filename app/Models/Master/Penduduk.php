<?php

namespace App\Models\Master;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'master_penduduk';
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
