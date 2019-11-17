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
                    'nomor_surat' => '583',
                    'keterangan' => 'Keterangan Usaha',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '200',
                    'keterangan' => 'Keterangan Catatan Kepolisian (SKCK)',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Ghoib',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '200',
                    'keterangan' => 'Keterangan Bersih Diri',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '200',
                    'keterangan' => 'Keterangan Kehilangan',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '200',
                    'keterangan' => 'Keterangan Izin Rame-Rame',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Domisili',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Beda Identitas',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Kartu Keluarga Sementara',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Tanda Penduduk Sementara',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Tidak Mampu',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Kelahiran',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Kematian',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Janda atau Duda',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Penghasilan',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Tidak Bekerja',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Belum Menikah',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '400',
                    'keterangan' => 'Keterangan Tanggungan Keluarga',
                    'created_at' => $date
                ],
                [
                    'nomor_surat' => '474',
                    'keterangan' => 'Keterangan Belum Memiliki Rumah',
                    'created_at' => $date
                ],
            ]);
    }
}
