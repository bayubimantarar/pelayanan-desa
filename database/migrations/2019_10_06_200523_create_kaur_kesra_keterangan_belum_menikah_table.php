<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurKesraKeteranganBelumMenikahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_kesra_keterangan_belum_menikah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penduduk_id');
            $table->bigInteger('perangkat_id');
            // $table->string('status', 150);
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
        Schema::dropIfExists('kaur_kesra_keterangan_belum_menikah');
    }
}
