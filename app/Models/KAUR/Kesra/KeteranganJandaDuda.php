<?php

namespace App\Models\KAUR\Kesra;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganJandaDuda extends Model
{
    protected $table = 'kaur_kesra_keterangan_janda_duda';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'status',
        'nama',
        'nomor_pensiun',
        'tanggal_meninggal',
        'pensiunan'
    ];
    protected $date = [
        'tanggal_meninggal'
    ];

    public function getTanggalMeninggalAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }
}
