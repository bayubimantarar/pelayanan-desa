<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanSuratStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_surat_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kode_permintaan_surat');
            $table->date('tanggal_status')->nullable();
            $table->string('status_proses')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('permintaan_surat_status');
    }
}
