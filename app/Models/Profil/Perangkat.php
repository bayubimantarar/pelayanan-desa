<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = 'profil_perangkat';
    protected $fillable = [
        'nama',
        'jabatan'
    ];
}
