<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('pendidikan')->truncate();
        $date = Carbon::now();

        $insert = DB::table('pendidikan')
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
