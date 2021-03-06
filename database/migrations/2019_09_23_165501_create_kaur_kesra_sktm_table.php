<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurKesraSktmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_kesra_sktm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penduduk_id');
            $table->bigInteger('perangkat_id');
            $table->bigInteger('pengguna_id');
            $table->string('jenis_sktm', 150);
            $table->string('nama', 150)->nullable();
            $table->string('tempat_lahir', 150)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 150)->nullable();
            $table->string('nama_sekolah', 150)->nullable();
            $table->string('kelas', 150)->nullable();
            $table->string('jurusan', 150)->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->string('diwakili_oleh', 150)->nullable();
            $table->text('redaksi');
            $table->string('keperluan', 150);
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
        Schema::dropIfExists('kaur_kesra_sktm');
    }
}
