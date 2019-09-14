<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterJenisKelaminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('master_jenis_kelamin')->truncate();
        $insert = DB::table('master_jenis_kelamin')
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
