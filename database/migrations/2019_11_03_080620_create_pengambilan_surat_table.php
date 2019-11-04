<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengambilanSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('permintaan_surat_id');
            $table->bigInteger('pengguna_id');
            $table->date('tanggal_pengambilan');
            $table->string('status_pengambilan', 150);
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
        Schema::dropIfExists('pengambilan_surat');
    }
}
