<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterPendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('master_pendidikan')->truncate();
        $insert = DB::table('master_pendidikan')
            ->insert([
                [
                    'keterangan' => 'Tidak/Belum Sekolah',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Belum Tamat SD/Sederajat',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Tamat SD/Sederajat',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'SLTP/Sederajat',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'SLTA/Sederajat',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Diploma I/II',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Akademi/Diploma III/S.Muda',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Diploma IV/Strata I',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Strata II',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Strata III',
                    'created_at' => $date
                ]
            ]);
    }
}
