<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'master_surat';
    protected $fillable = [
        'keterangan'
    ];
}
