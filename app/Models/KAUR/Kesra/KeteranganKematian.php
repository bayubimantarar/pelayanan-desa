<?php

namespace App\Models\KAUR\Kesra;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganKematian extends Model
{
    protected $table = 'kaur_kesra_keterangan_kematian';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'tanggal_meninggal',
        'hari_meninggal',
        'jam_meninggal',
        'alamat_meninggal',
        'hubungan_pelapor',
        'penyebab_meninggal'
    ];
    protected $date = [
        'tanggal_lahir',
        'tanggal_meninggal',
        'jam_meninggal'
    ];

    public function getJamMeninggalAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

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
