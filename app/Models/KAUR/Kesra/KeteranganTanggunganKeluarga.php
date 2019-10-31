<?php

namespace App\Models\KAUR\Kesra;

use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;
use App\Models\KAUR\Kesra\KeteranganTanggunganKeluargaAnggota;

class KeteranganTanggunganKeluarga extends Model
{
    protected $table = 'kaur_kesra_keterangan_tanggungan_keluarga';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'pengguna_id',
        'redaksi'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }

    public function anggota_keluarga()
    {
        return $this->hasMany(KeteranganTanggunganKeluargaAnggota::class, 'kaur_kesra_keterangan_tanggungan_keluarga_id', 'id');
    }
}
