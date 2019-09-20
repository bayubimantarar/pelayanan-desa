<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurPemerintahanKeteranganKtpSementara extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_pemerintahan_keterangan_ktp_sementara', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('master_penduduk_id');
            $table->bigInteger('profil_perangkat_id');
            $table->text('redaksi');
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
        Schema::dropIfExists('kaur_pemerintahan_keterangan_ktp_sementara');
    }
}
