<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurTantribUmumKeteranganIzinRameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_tantrib_umum_keterangan_izin_rame', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penduduk_id');
            $table->bigInteger('perangkat_id');
            $table->bigInteger('pengguna_id');
            $table->string('rt', 75);
            $table->string('rw', 75);
            $table->date('tertanggal_rt');
            $table->date('tertanggal_rw');
            $table->string('acara', 150)->nullable();
            $table->string('kegiatan', 150)->nullable();
            $table->date('tanggal_pelaksanaan');
            $table->string('waktu_pelaksanaan', 150)->nullable();
            $table->text('alamat_pelaksanaan')->nullable();
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
        Schema::dropIfExists('kaur_tantrib_umum_keterangan_izin_rame');
    }
}
