<?php

namespace App\Models\KAUR\Kesra;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class SKTM extends Model
{
    protected $table = 'kaur_kesra_sktm';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'jenis_sktm',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_sekolah',
        'kelas',
        'jurusan',
        'alamat_sekolah',
        'diwakili_oleh',
        'redaksi',
        'keperluan'
    ];
    protected $dates = [
        'tanggal_lahir'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }

    public function getTanggalLahirAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }
}
