<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePejabatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabat', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('nip')->unique();
            $table->string('nama', 150);
            $table->string('tempat_lahir', 150);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 150);
            $table->string('jabatan', 150);
            $table->string('foto', 150);
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
        Schema::dropIfExists('pejabat');
    }
}
