<?php

use Illuminate\Database\Seeder;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('pengguna')->truncate();

        $insert = DB::table('pengguna')
        ->insert([
            'nama' => 'Bayu Bimantara',
            'email' => 'bayubimantara@desa.id',
            'password' => bcrypt('123'),
            'nomor_telepon' => '0895332055486',
            'alamat' => 'Bukit Permata Blok A1 No. 14',
            'jenis_pengguna' => 'Pelayanan'
        ]);
    }
}
