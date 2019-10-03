<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurPemerintahanKeteranganDomisiliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_pemerintahan_keterangan_domisili', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penduduk_id');
            $table->bigInteger('perangkat_id');
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
        Schema::dropIfExists('kaur_pemerintahan_keterangan_domisili');
    }
}
