<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProfilPerangkatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('profil_perangkat')->truncate();

        // $insert = DB::table('profil_perangkat')
        //     ->insert([
        //         [
        //             'nama' => 'Aas Mohamad Asor, SH',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Kepala Desa',
        //             'status' => '1',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Yayat Ruhiyat, SH, MM',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Sekretaris',
        //             'status' => '1',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Tri Sopyan',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'KAUR Perencanaan',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Dedeh Maryati',
        //             'jenis_kelamin' => 'Perempuan',
        //             'jabatan' => 'KAUR Keuangan',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Yulianti, S.Ikom',
        //             'jenis_kelamin' => 'Perempuan',
        //             'jabatan' => 'KAUR Umum & T.U',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Koko Koswara',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'KASI Pemerintahan',
        //             'status' => '1',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Usep Sudarya',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'KASI Kesejahteraan',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Deni Ahmad Berlian',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'KASI Pelayanan',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Rika Kartika',
        //             'jenis_kelamin' => 'Perempuan',
        //             'jabatan' => 'Staf Keuangan Desa',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Riri Rosmayanti',
        //             'jenis_kelamin' => 'Perempuan',
        //             'jabatan' => 'Staf Desa',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Mariam',
        //             'jenis_kelamin' => 'Perempuan',
        //             'jabatan' => 'Staf Desa',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Ramdani Buldansyah',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Kepala Dusun 1',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Buhori Muslim',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Kepala Dusun 2',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Momo Sahroni',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Kepala Dusun 3',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Engkus Kuswara',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Kepala Dusun 4',
        //             'status' => '0',
        //             'created_at' => $date
        //         ],
        //         [
        //             'nama' => 'Cecep Anang K',
        //             'jenis_kelamin' => 'Laki-laki',
        //             'jabatan' => 'Kepala Dusun 5',
        //             'status' => '0',
        //             'created_at' => $date
        //         ]
        //     ]);
    }
}
