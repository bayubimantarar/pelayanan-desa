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
            $table->string('nik');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->date('tanggal_surat_pengantar');
            $table->text('keperluan');
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
