<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterAgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('master_agama')->truncate();
        $insert = DB::table('master_agama')
            ->insert([
                [
                    'keterangan' => 'Islam',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Kristen',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Katolik',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Hindu',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Buddha',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Konghucu',
                    'created_at' => $date
                ]
            ]);
    }
}
