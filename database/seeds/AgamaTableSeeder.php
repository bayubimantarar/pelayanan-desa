<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('agama')->truncate();
        $date = Carbon::now();

        $insert = DB::table('agama')
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
                'keterangan' => 'Kong Hu Cu',
                'created_at' => $date
            ]
        ]);
    }
}
