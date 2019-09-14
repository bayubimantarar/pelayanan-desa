<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MasterPenggunaTableSeeder::class);
        $this->call(MasterPendudukTableSeeder::class);
        $this->call(MasterAgamaTableSeeder::class);
        $this->call(MasterJenisKelaminTableSeeder::class);
        $this->call(MasterPendidikanTableSeeder::class);
        $this->call(MasterStatusPerkawinanTableSeeder::class);
    }
}
