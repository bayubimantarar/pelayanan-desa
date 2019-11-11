<?php

use Illuminate\Database\Seeder;
use App\Models\Kependudukan\Penduduk;

class KependudukanPendudukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('kependudukan_penduduk')->truncate();

        $created = Factory(Penduduk::class, 10)->create();

        $createPendudukDataForTest = DB::table('kependudukan_penduduk')->insert([
            'nik' => '3217207970001',
            'nama' => 'Bayu Bimantara',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1997-07-25',
            'jenis_kelamin' => 'Laki-laki',
            'status_perkawinan' => 'Belum Kawin',
            'agama' => 'Islam',
            'pendidikan' => 'SLTA/Sederajat',
            'pekerjaan' => 'Pelajar',
            'alamat' => 'Bukit Permata Blok A1 No. 14'
        ]);
    }
}
