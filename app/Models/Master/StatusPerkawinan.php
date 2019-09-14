<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    protected $table = 'master_status_perkawinan';
    protected $fillable = [
        'keterangan'
    ];
}
