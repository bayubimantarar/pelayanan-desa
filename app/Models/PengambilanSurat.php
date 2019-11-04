<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengambilanSurat extends Model
{
    protected $table = 'pengambilan_surat';
    protected $fillable = [
        'permintaan_surat_id',
        'pengguna_id',
        'tanggal_pengambilan',
        'status_pengambilan'
    ];
    protected $dates = [
        'tanggal_pengambilan'
    ];
}
