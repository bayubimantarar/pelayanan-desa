<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatusPerkawinanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('status_perkawinan')->truncate();
        $date = Carbon::now();

        $insert = DB::table('status_perkawinan')
        ->insert([
            [
                'keterangan' => 'Kawin',
                'created_at' => $date
            ],
            [
                'keterangan' => 'Belum Kawin',
                'created_at' => $date
            ]
        ]);
    }
}
