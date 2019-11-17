<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\PermintaanSuratStatus;
use Illuminate\Database\Eloquent\Model;

class PermintaanSurat extends Model
{
    protected $table = 'permintaan_surat';
    protected $fillable = [
        'penduduk_id',
        'kode_permintaan_surat',
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
