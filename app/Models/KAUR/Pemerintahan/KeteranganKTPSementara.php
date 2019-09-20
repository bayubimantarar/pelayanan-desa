<?php

namespace App\Models\KAUR\Pemerintahan;

use Carbon\Carbon;
use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class KeteranganKTPSementara extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_ktp_sementara';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'redaksi'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }
}