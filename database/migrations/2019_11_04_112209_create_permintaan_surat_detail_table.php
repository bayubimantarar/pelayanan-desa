<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanSuratDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_surat_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('permintaan_surat_id');

            // keterangan usaha
            $table->string('jenis_usaha', 150)->nullable(); // keterangan usaha
            $table->text('lokasi_usaha')->nullable(); // keterangan usaha
            $table->text('keperluan_usaha')->nullable(); // semua usaha

            // skck
            $table->string('rt_skck', 75)->nullable(); // semua surat
            $table->string('rw_skck', 75)->nullable(); // semua surat
            $table->date('tertanggal_rt_skck')->nullable(); // semua surat
            $table->date('tertanggal_rw_skck')->nullable(); // semua surat
            $table->text('keperluan_skck')->nullable(); // semua usaha

            // keterangan ghoib
            $table->string('nama_ghoib', 150)->nullable();
            $table->string('tempat_lahir_ghoib', 150)->nullable();
            $table->date('tanggal_lahir_ghoib')->nullable();
            $table->text('alamat_ghoib')->nullable();
            $table->text('alasan_ghoib')->nullable();

            // keterangan bersih diri
            $table->text('keperluan_bersih_diri')->nullable(); // semua surat

            // keterangan kehilangan
            $table->string('rt_kehilangan', 75)->nullable(); // semua surat
            $table->string('rw_kehilangan', 75)->nullable(); // semua surat
            $table->date('tertanggal_rt_kehilangan')->nullable(); // semua surat
            $table->date('tertanggal_rw_kehilangan')->nullable(); // semua surat
            $table->text('alasan_kehilangan')->nullable(); // semua usaha

            // keterangan izin rame-rame
            $table->string('rt_izin_rame', 75)->nullable(); // semua surat
            $table->string('rw_izin_rame', 75)->nullable(); // semua surat
            $table->date('tertanggal_rt_izin_rame')->nullable(); // semua surat
            $table->date('tertanggal_rw_izin_rame')->nullable(); // semua surat
            $table->string('acara', 150)->nullable();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->string('kegiatan', 150)->nullable();
            $table->string('waktu_pelaksanaan', 150)->nullable();
            $table->text('alamat_pelaksanaan')->nullable();

            // keterangan domisili
            $table->text('keperluan_domisili')->nullable(); // semua surat

            // keterangan tidak mampu
            $table->string('jenis_sktm', 150)->nullable();
            $table->string('nama_sktm', 150)->nullable();
            $table->string('tempat_lahir_sktm', 150)->nullable();
            $table->date('tanggal_lahir_sktm')->nullable();
            $table->string('jenis_kelamin_sktm', 150)->nullable();
            $table->string('nama_sekolah', 150)->nullable();
            $table->string('kelas', 150)->nullable();
            $table->string('jurusan', 150)->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->string('diwakili_oleh', 150)->nullable();
            $table->text('keperluan_sktm')->nullable(); // semua surat

            // keterangan kelahiran
            $table->string('nama_anak', 150)->nullable();
            $table->string('tempat_lahir_anak', 150)->nullable();
            $table->date('tanggal_lahir_anak')->nullable();
            $table->string('jenis_kelamin_anak', 150)->nullable();
            $table->string('anak_ke', 150)->nullable();
            $table->text('alamat_anak')->nullable();
            $table->string('nama_ayah', 150)->nullable();
            $table->string('umur_ayah', 150)->nullable();
            $table->string('agama_ayah', 150)->nullable();
            $table->string('pekerjaan_ayah', 150)->nullable();
            $table->text('alamat_ayah')->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->string('umur_ibu', 150)->nullable();
            $table->string('agama_ibu', 150)->nullable();
            $table->string('pekerjaan_ibu', 150)->nullable();
            $table->text('alamat_ibu')->nullable();

            // keterangan kematian
            $table->string('nama_almarhum', 150)->nullable();
            $table->string('tempat_lahir_almarhum', 150)->nullable();
            $table->date('tanggal_lahir_almarhum')->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->string('jenis_kelamin_almarhum', 150)->nullable();
            $table->text('alamat_meninggal')->nullable();
            $table->string('penyebab', 150)->nullable();
            $table->string('hubungan_pelapor', 150)->nullable();

            // keterangan janda atau duda
            $table->string('status', 150)->nullable();
            $table->string('nama_pensiun', 150)->nullable();
            $table->string('nomor_pensiun', 150)->nullable();
            $table->date('tanggal_meninggal_pensiun')->nullable();
            $table->text('pensiunan')->nullable();

            // keterangan penghasilan
            $table->string('penghasilan', 150)->nullable();

            // keterangan tidak bekerja
            $table->text('keperluan_tidak_bekerja')->nullable(); // semua surat

            // keterangan belum menikah
            $table->text('keperluan_belum_menikah')->nullable(); // semua surat

            // keterangan belum memiliki rumah
            $table->text('keperluan_belum_memiliki_rumah')->nullable(); // semua surat

            // semua surat
            // $table->string('rt', 75)->nullable(); // semua surat
            // $table->string('rw', 75)->nullable(); // semua surat
            // $table->date('tertanggal_rt')->nullable(); // semua surat
            // $table->date('tertanggal_rw')->nullable(); // semua surat
            // $table->date('tanggal_lahir')->nullable(); // semua surat
            // $table->string('tempat_lahir', 150)->nullable(); // semua surat
            // $table->string('jenis_kelamin', 150)->nullable(); // semua surat
            // $table->text('alamat')->nullable(); // semua surat
            // $table->text('alasan')->nullable(); // semua surat
            // $table->text('keperluan')->nullable(); // semua surat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_surat_detail');
    }
}
