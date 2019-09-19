<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProfilPemerintahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('profil_pemerintahan')->truncate();
        $insert = DB::table('profil_pemerintahan')
            ->insert([
                [
                    'kabupaten' => 'Bandung Barat',
                    'kecamatan' => 'Ngamprah',
                    'desa' => 'Cilame',
                    'nama_kepala_desa' => 'Aas Mohamad Asor, SH',
                    'email' => 'info@cilame.desa.id',
                    'alamat' => 'Jalan Galudra No. 37 Desa Cilame Kec. Ngamprah 40552',
                    'created_at' => $date
                ]
            ]);
    }
}
