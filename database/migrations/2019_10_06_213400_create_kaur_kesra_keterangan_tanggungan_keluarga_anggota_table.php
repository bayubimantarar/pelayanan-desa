<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurKesraKeteranganTanggunganKeluargaAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_kesra_keterangan_tanggungan_keluarga_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kaur_kesra_keterangan_tanggungan_keluarga_id');
            $table->bigInteger('nik');
            $table->string('nama', 150);
            $table->string('tempat_lahir', 150);
            $table->date('tanggal_lahir', 150);
            $table->string('hubungan_keluarga', 150);
            $table->string('jenis_kelamin', 150);
            $table->string('pekerjaan', 150)->nullable();
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
        Schema::dropIfExists('kaur_kesra_keterangan_tanggungan_keluarga_anggota');
    }
}
