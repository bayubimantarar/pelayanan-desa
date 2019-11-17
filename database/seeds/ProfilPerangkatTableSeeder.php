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
        $insert = DB::table('profil_perangkat')
            ->insert([
                [
                    'nama' => 'Aas Mohamad Asor, S.H',
                    'jabatan' => 'Kepala Desa',
                    'status' => '1',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Yayat Ruhiyat, S.H, M.M',
                    'jabatan' => 'Sekretaris',
                    'status' => '1',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Tri Sopyan',
                    'jabatan' => 'KAUR Perencanaan',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Dedeh Maryati',
                    'jabatan' => 'KAUR Keuangan',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Yulianti, S.Ikom',
                    'jabatan' => 'KAUR Umum & T.U',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Koko Koswara',
                    'jabatan' => 'KASI Pemerintahan',
                    'status' => '1',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Usep Sudarya',
                    'jabatan' => 'KASI Kesejahteraan',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Deni Ahmad Berlian',
                    'jabatan' => 'KASI Pelayanan',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Ramdani Buldansyah',
                    'jabatan' => 'Kepala Dusun 1',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Buhori Muslim',
                    'jabatan' => 'Kepala Dusun 2',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Momo Sahroni',
                    'jabatan' => 'Kepala Dusun 3',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Engkus Kuswara',
                    'jabatan' => 'Kepala Dusun 4',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Cecep Anang K',
                    'jabatan' => 'Kepala Dusun 5',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Dedeh Maryati',
                    'jabatan' => 'Bendahara Desa',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Staf Keuangan Desa',
                    'jabatan' => 'Rika Kartika',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Riri Rosmayanti',
                    'jabatan' => 'Staf Desa',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Mariam',
                    'jabatan' => 'Staf Desa',
                    'status' => '0',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Bayu Bimantara',
                    'jabatan' => 'Staf Desa',
                    'status' => '0',
                    'created_at' => $date
                ]
            ]);
    }
}
