<?php

namespace App\Models\KAUR\Kesra;

use Carbon\Carbon;
use App\Models\Master\Penduduk;
use App\Models\Profil\Perangkat;
use Illuminate\Database\Eloquent\Model;

class SKTM extends Model
{
    protected $table = 'kaur_kesra_sktm';
    protected $fillable = [
        'master_penduduk_id',
        'profil_perangkat_id',
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
        return $this->belongsTo(Penduduk::class, 'master_penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'profil_perangkat_id', 'id');
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
