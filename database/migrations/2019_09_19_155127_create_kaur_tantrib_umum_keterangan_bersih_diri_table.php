<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurTantribUmumKeteranganBersihDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_tantrib_umum_keterangan_bersih_diri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('master_penduduk_id');
            $table->bigInteger('profil_perangkat_id');
            $table->string('nama_ayah', 150);
            $table->string('tempat_lahir_ayah', 150)->nullable();
            $table->string('tanggal_lahir_ayah', 150)->nullable();
            $table->string('agama_ayah', 150)->nullable();
            $table->string('pekerjaan_ayah', 150)->nullable();
            $table->string('alamat_ayah', 150)->nullable();
            $table->string('nama_ibu', 150);
            $table->string('tempat_lahir_ibu', 150)->nullable();
            $table->string('tanggal_lahir_ibu', 150)->nullable();
            $table->string('agama_ibu', 150)->nullable();
            $table->string('pekerjaan_ibu', 150)->nullable();
            $table->string('alamat_ibu', 150)->nullable();
            $table->text('redaksi');
            $table->text('keperluan');
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
        Schema::dropIfExists('kaur_tantrib_umum_keterangan_bersih_diri');
    }
}
