<?php

namespace App\Models\KAUR\Kesra;

use Terbilang;
use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganPenghasilan extends Model
{
    protected $table = 'kaur_kesra_keterangan_penghasilan';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'pengguna_id',
        'penghasilan',
        'redaksi'
    ];

    public function getPenghasilanRupiahAttribute($value)
    {
        return number_format($this->penghasilan, 0, ',', '.');
    }

    public function getPenghasilanTerbilangAttribute($value)
    {
        return Terbilang::make($this->penghasilan, ' rupiah');
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
