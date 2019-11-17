<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pengguna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('perangkat_id')->unique();
            $table->string('email', 150)->unique();
            $table->string('password', 150);
            $table->string('nomor_telepon', 150);
            $table->text('alamat');
            $table->string('jenis_pengguna', 150);
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
        Schema::dropIfExists('master_pengguna');
    }
}
