<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_biodata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NIK', 150);
            $table->string('nama_lengkap', 150);
            $table->string('jenis_kelamin', 150);
            $table->string('alamat', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_biodata');
    }
}
