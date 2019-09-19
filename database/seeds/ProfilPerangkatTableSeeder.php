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
                    'created_at' => $date
                ],
                [
                    'nama' => 'Yayat Ruhiyat, S.H, M.M',
                    'jabatan' => 'Sekretaris',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Tri Sopyan',
                    'jabatan' => 'KAUR Perencanaan',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Dedeh Maryati',
                    'jabatan' => 'KAUR Keuangan',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Yulianti, S.Ikom',
                    'jabatan' => 'KAUR Umum & T.U',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Koko Koswara',
                    'jabatan' => 'KASI Pemerintahan',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Usep Sudarya',
                    'jabatan' => 'KASI Kesejahteraan',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Deni Ahmad Berlian',
                    'jabatan' => 'KASI Pelayanan',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Ramdani Buldansyah',
                    'jabatan' => 'Kepala Dusun 1',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Buhori Muslim',
                    'jabatan' => 'Kepala Dusun 2',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Momo Sahroni',
                    'jabatan' => 'Kepala Dusun 3',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Engkus Kuswara',
                    'jabatan' => 'Kepala Dusun 4',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Cecep Anang K',
                    'jabatan' => 'Kepala Dusun 5',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Dedeh Maryati',
                    'jabatan' => 'Bendahara Desa',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Staf Keuangan Desa',
                    'jabatan' => 'Rika Kartika',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Riri Rosmayanti',
                    'jabatan' => 'Staf Desa',
                    'created_at' => $date
                ],
                [
                    'nama' => 'Mariam',
                    'jabatan' => 'Staf Desa',
                    'created_at' => $date
                ]
            ]);
    }
}
