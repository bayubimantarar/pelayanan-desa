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
                    'keterangan' => 'SD',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'SMP',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'SMA',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'D1',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'D2',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'D3',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'S1',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'S2',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'S3',
                    'created_at' => $date
                ]
            ]);
    }
}
