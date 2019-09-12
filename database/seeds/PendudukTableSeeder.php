<?php

use Carbon\Carbon;
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
        $date = Carbon::now();

        $insert = DB::table('penduduk')
        ->insert([
            [
                'nik' => '32178191881',
                'nama' => 'John Doe',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1997-07-25',
                'jenis_kelamin' => 'Laki-laki',
                'status_perkawinan' => 'Belum Kawin',
                'agama' => 'Islam',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Buruh',
                'alamat' => 'Bukit Permata',
                'created_at' => $date
            ],
            [
                'nik' => '32178191882',
                'nama' => 'Jane Doe',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1996-09-17',
                'jenis_kelamin' => 'Perempuan',
                'status_perkawinan' => 'Kawin',
                'agama' => 'Kristen Protestan',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Kota Baru',
                'created_at' => $date
            ]
        ]);
    }
}
