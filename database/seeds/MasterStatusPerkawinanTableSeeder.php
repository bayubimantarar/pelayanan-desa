<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterStatusPerkawinanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('master_status_perkawinan')->truncate();
        $insert = DB::table('master_status_perkawinan')
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
