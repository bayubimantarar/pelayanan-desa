<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'master_pendidikan';
    protected $fillable = [
        'keterangan'
    ];
}
