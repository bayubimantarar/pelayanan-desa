<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Kependudukan\Penduduk;

$factory->define(Penduduk::class, function (Faker $faker) {
    return [
        'nik' => $faker->unique->numberBetween('3000000000000000', '4000000000000000'),
        'nama' => $faker->name(),
        'tempat_lahir' => $faker->city(),
        'tanggal_lahir' => $faker->date(),
        'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        'status_perkawinan' => $faker->randomElement(['Kawin', 'Belum Kawin']),
        'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu']),
        'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']),
        'pekerjaan' => $faker->jobTitle(),
        'alamat' => $faker->address()
    ];
});
