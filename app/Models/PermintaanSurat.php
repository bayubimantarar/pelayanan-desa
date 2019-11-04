<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PermintaanSurat extends Model
{
    protected $table = 'permintaan_surat';
    protected $fillable = [
        'nik',
        'nama',
        'nomor_telepon',
        'alamat',
        'email',
        'lampiran',
        'surat',
        'status_proses'
    ];

    public function getTanggalPermintaanAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }
}
