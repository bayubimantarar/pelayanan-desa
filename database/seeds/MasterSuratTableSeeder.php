<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterSuratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $truncate = DB::table('master_surat')->truncate();

        $insert = DB::table('master_surat')
            ->insert([
                [
                    'keterangan' => 'Keterangan Usaha',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Catatan Kepolisian (SKCK)',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Ghoib',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Bersih Diri',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Kehilangan',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Izin Rame-Rame',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Domisili',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Beda Identitas',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Kartu Keluarga Sementara',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Tanda Penduduk Sementara',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Tidak Mampu',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Kelahiran',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Kematian',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Janda atau Duda',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Penghasilan',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Tidak Bekerja',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Belum Menikah',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Tanggungan Keluarga',
                    'created_at' => $date
                ],
                [
                    'keterangan' => 'Keterangan Belum Memiliki Rumah',
                    'created_at' => $date
                ],
            ]);
    }
}
