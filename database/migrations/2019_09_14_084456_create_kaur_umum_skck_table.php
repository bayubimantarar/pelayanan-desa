<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaurUmumSkckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaur_umum_skck', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penduduk_id');
            $table->bigInteger('perangkat_id');
            $table->bigInteger('pengguna_id');
            $table->string('rt', 75);
            $table->string('rw', 75);
            $table->date('tertanggal_rt');
            $table->date('tertanggal_rw');
            $table->text('keperluan');
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
        Schema::dropIfExists('kaur_umum_skck');
    }
}
