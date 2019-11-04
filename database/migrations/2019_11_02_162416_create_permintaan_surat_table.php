<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', 75);
            $table->string('nama', 75);
            $table->string('nomor_telepon', 75)->nullable();
            $table->string('alamat', 75)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('surat', 150);
            $table->string('lampiran', 150)->nullable();
            $table->string('status_proses');
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
        Schema::dropIfExists('permintaan_surat');
    }
}
