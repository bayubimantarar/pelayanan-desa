<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Model;

class Pemerintahan extends Model
{
    protected $table = 'profil_pemerintahan';
    protected $fillable = [
        'kabupaten',
        'kecamatan',
        'desa',
        'nama_kepala_desa',
        'email',
        'alamat'
    ];
}
