<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JenisKelaminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('jenis_kelamin')->truncate();
        $date = Carbon::now();

        $insert = DB::table('jenis_kelamin')
        ->insert([
            [
                'keterangan' => 'Laki-laki',
                'created_at' => $date
            ],
            [
                'keterangan' => 'Perempuan',
                'created_at' => $date
            ]
        ]);
    }
}
