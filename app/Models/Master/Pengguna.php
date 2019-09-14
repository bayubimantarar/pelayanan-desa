<?php

namespace App\Models\Master;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'master_pengguna';
    protected $guard = 'pengguna';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'jenis_pengguna'
    ];
}
