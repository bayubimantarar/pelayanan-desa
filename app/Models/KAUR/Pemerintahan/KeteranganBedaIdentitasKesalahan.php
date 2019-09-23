<?php

namespace App\Models\KAUR\Pemerintahan;

use Illuminate\Database\Eloquent\Model;

class KeteranganBedaIdentitasKesalahan extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_beda_identitas_kesalahan';
    protected $fillable = [
        'kaur_pemerintahan_keterangan_beda_identitas_id',
        'data',
        'keterangan'
    ];
}
