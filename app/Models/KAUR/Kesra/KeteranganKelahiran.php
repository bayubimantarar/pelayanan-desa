<?php

namespace App\Models\KAUR\Kesra;

use Carbon\Carbon;
use App\Models\Profil\Perangkat;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Model;

class KeteranganKelahiran extends Model
{
    protected $table = 'kaur_kesra_keterangan_kelahiran';
    protected $fillable = [
        'penduduk_id',
        'perangkat_id',
        'nama_anak',
        'tempat_lahir_anak',
        'tanggal_lahir_anak',
        'hari_lahir_anak',
        'jam_lahir_anak',
        'jenis_kelamin_anak',
        'anak_ke',
        'alamat_anak',
        'nama_ayah',
        'umur_ayah',
        'agama_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'umur_ibu',
        'agama_ibu',
        'pekerjaan_ibu',
        'alamat_ibu'
    ];
    protected $date = [
        'tanggal_lahir_anak',
        'jam_lahir_anak'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function profil_perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }
}
