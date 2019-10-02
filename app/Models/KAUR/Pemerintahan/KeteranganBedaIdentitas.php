<?php

namespace App\Models\KAUR\Pemerintahan;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganBedaIdentitas extends Model
{
    protected $table = 'kaur_pemerintahan_keterangan_beda_identitas';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
        'redaksi_tercantum_awal',
        'redaksi_tercantum_akhir',
        'jumlah_kesalahan',
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
