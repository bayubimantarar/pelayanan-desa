<?php

namespace App\Models\KAUR\Kesra;

use Illuminate\Database\Eloquent\Model;

class KeteranganKematian extends Model
{
    protected $table = 'kaur_kesra_keterangan_kematian';
    protected $fillable = [
        'penduduk_id',
        'profil_id',
        'nama',
        'jenis_kelamin',
        'tanggal_meninggal',
        'hari_meninggal',
        'jam_meninggal',
        'alamat_meninggal',
        'penyebab_kematian'
    ];
    protected $dates = [
        'tanggal_meninggal',
        'jam_meninggal'
    ];
}
