<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurPemerintahanKeteranganKkSementaraAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_pemerintahan_keterangan_kk_sementara_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kaur_pemerintahan_keterangan_kk_sementara_id');
            $table->string('nik', 150);
            $table->string('nama', 150);
            $table->string('tempat_lahir', 150);
            $table->date('tanggal_lahir');
            $table->string('hubungan_keluarga', 150);
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
        Schema::dropIfExists('kaur_pemerintahan_keterangan_kk_sementara_anggota');
    }
}
