<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('password');
            $table->string('tlp');
            $table->string('tingkat');
            $table->string('kelas');
            $table->string('foto');
            $table->string('npsn')->unique();
            $table->string('nama_sekolah');
            $table->string('alamat');
            $table->string('guru_pembimbing');
            $table->string('tlp_guru');
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
        Schema::dropIfExists('siswa');
    }
}
