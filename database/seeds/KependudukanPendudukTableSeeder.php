<?php

use Illuminate\Database\Seeder;
use App\Models\Kependudukan\Penduduk;

class KependudukanPendudukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncate = DB::table('kependudukan_penduduk')->truncate();

        $created = Factory(Penduduk::class, 10)->create();
    }
}
