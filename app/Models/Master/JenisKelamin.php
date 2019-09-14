<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    protected $table = 'master_jenis_kelamin';
    protected $fillable = [
        'keterangan'
    ];
}
