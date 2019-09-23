<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurPemerintahanKeteranganBedaIdentitasKesalahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_pemerintahan_keterangan_beda_identitas_kesalahan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kaur_pemerintahan_keterangan_beda_identitas_id');
            $table->text('data');
            $table->text('keterangan');
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
        Schema::dropIfExists('kaur_pemerintahan_keterangan_beda_identitas_kesalahan');
    }
}
