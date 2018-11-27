<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_season',100);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('operasi_season',15);
            $table->float('presentase_harga');
            $table->integer('jenis_season')->unsigned();
            $table->timestamps();
            $table->foreign('jenis_season')->references('id')->on('jenis_seasons')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
