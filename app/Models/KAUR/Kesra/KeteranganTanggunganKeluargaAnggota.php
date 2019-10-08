<?php

namespace App\Models\KAUR\Kesra;

use Illuminate\Database\Eloquent\Model;

class KeteranganTanggunganKeluargaAnggota extends Model
{
    protected $table = 'kaur_kesra_keterangan_tanggungan_keluarga_anggota';
    protected $fillable = [
        'kaur_kesra_keterangan_tanggungan_keluarga_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'hubungan_keluarga',
        'jenis_kelamin',
        'pekerjaan'
    ];
    protected $date = [
        'tanggal_lahir'
    ];
}
