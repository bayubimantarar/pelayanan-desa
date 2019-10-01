<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurKesraKeteranganKematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_kesra_keterangan_kematian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('master_penduduk_id');
            $table->bigInteger('profil_perangkat_id');
            $table->string('nama', 150);
            $table->string('jenis_kelamin', 150);
            $table->date('tanggal_meninggal');
            $table->string('hari_meninggal', 150)->nullable();
            $table->time('jam_meninggal')->nullable();
            $table->text('alamat_meninggal');
            $table->string('penyebab_kematian', 150);
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
        Schema::dropIfExists('kaur_kesra_keterangan_kematian');
    }
}
