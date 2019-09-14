<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterPenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('master_pengguna')->truncate();
        $insert = DB::table('master_pengguna')
            ->insert([
                [
                    'nama' => 'Bayu Bimantara',
                    'email' => 'bayu@desa.id',
                    'password' => bcrypt('123'),
                    'nomor_telepon' => '0895332055486',
                    'alamat' => 'Kota Baru',
                    'jenis_pengguna' => 'Admin',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Resti Wulandari',
                    'email' => 'resti@desa.id',
                    'password' => bcrypt('123'),
                    'nomor_telepon' => '0895332055486',
                    'alamat' => 'Kota Baru',
                    'jenis_pengguna' => 'Pelayanan',
                    'created_at' => $date
                ]
            ]);
    }
}
