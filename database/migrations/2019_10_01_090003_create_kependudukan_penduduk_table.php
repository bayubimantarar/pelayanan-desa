<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKependudukanPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_penduduk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', 75)->unique();
            $table->string('nama', 150);
            $table->string('tempat_lahir', 150);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 150);
            $table->string('status_perkawinan', 150);
            $table->string('agama', 150);
            $table->string('pendidikan', 150);
            $table->string('pekerjaan', 150)->nullable();
            $table->string('alamat', 150);
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
        Schema::dropIfExists('kependudukan_penduduk');
    }
}
