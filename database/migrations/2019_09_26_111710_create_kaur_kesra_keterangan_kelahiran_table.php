<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurKesraKeteranganKelahiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_kesra_keterangan_kelahiran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penduduk_id');
            $table->bigInteger('perangkat_id');
            $table->string('nama_anak', 150);
            $table->string('tempat_lahir_anak', 150);
            $table->date('tanggal_lahir_anak');
            $table->string('jenis_kelamin_anak', 150);
            $table->string('hari_lahir_anak', 150)->nullable();
            $table->time('jam_lahir_anak')->nullable();
            $table->string('anak_ke', 150)->nullable();
            $table->text('alamat_anak')->nullable();
            $table->string('nama_ayah', 150)->nullable();
            $table->string('umur_ayah', 150)->nullable();
            $table->string('agama_ayah', 150)->nullable();
            $table->string('pekerjaan_ayah', 150)->nullable();
            $table->string('alamat_ayah', 150)->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->string('umur_ibu', 150)->nullable();
            $table->string('agama_ibu', 150)->nullable();
            $table->string('pekerjaan_ibu', 150)->nullable();
            $table->string('alamat_ibu', 150)->nullable();
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
        Schema::dropIfExists('kaur_kesra_keterangan_kelahiran');
    }
}
