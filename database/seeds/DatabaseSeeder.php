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
        $this->call(PenggunaTableSeeder::class);
        $this->call(PendudukTableSeeder::class);
        $this->call(AgamaTableSeeder::class);
        $this->call(JenisKelaminTableSeeder::class);
        $this->call(PendidikanTableSeeder::class);
        $this->call(StatusPerkawinanTableSeeder::class);
    }
}
