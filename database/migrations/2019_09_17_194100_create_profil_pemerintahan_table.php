<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilPemerintahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_pemerintahan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kabupaten', 150);
            $table->string('kecamatan', 150);
            $table->string('desa', 150);
            $table->string('nama_kepala_desa', 150);
            $table->string('email', 150)->unique();
            $table->text('alamat');
            $table->string('logo', 150)->nullable();
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
        Schema::dropIfExists('profil_pemerintahan');
    }
}
