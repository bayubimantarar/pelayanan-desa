<?php

use Illuminate\Database\Seeder;

class PendudukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('penduduk')->truncate();

        $insert = DB::table('penduduk')
        ->insert([
            [
                'nik' => '32178191881',
                'nama' => 'John Doe',
                'jenis_kelamin' => 'Laki-laki',
                'status_perkawinan' => 'Belum Kawin',
                'agama' => 'Islam',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Buruh',
                'alamat' => 'Bukit Permata',
            ],
            [
                'nik' => '32178191882',
                'nama' => 'Jane Doe',
                'jenis_kelamin' => 'Perempuan',
                'status_perkawinan' => 'Kawin',
                'agama' => 'Kristen Protestan',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Kota Baru',
            ]
        ]);
    }
}
