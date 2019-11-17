<?php

namespace App\Models\Master;

use App\Models\Profil\Perangkat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'master_pengguna';
    protected $guard = 'pengguna';
    protected $fillable = [
        'perangkat_id',
        'email',
        'password',
        'nomor_telepon',
        'alamat',
        'jenis_pengguna',
    ];

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }
}
