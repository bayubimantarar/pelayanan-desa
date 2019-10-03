<?php

namespace App\Models\KAUR\Pemerintahan;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;
use App\Models\KAUR\Pemerintahan\KeteranganKKSementaraAnggota;

class KeteranganKKSementara extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_kk_sementara';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'anggota_keluarga',
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

    public function anggota_keluarga()
    {
        return $this->hasMany(KeteranganKKSementaraAnggota::class, 'kaur_pemerintahan_keterangan_kk_sementara_id', 'id');
    }
}
