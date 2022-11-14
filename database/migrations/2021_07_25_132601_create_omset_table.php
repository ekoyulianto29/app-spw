<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('omset', function (Blueprint $table) {
            $table->increments('id_omset');
            $table->string('id_usaha');
            $table->string('tahun');
            $table->string('bulan');
            $table->string('omset');
            $table->string('link_usaha');
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
        Schema::dropIfExists('omset');
    }
}
