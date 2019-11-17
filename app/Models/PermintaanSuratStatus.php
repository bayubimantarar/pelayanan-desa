<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PermintaanSuratStatus extends Model
{
    protected $table = 'permintaan_surat_status';
    protected $fillable = [
        'kode_permintaan_surat',
        'tanggal_status',
        'status_proses',
        'keterangan'
    ];

    public function getTanggalStatusAttribute($value)
    {
        return Carbon::parse($value)->format('d F Y');
    }
}
