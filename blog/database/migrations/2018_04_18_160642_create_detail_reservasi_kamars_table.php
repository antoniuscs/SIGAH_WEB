<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailReservasiKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_reservasi_kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_booking')->unsigned();
            $table->integer('kode_kamar')->unsigned();
            $table->integer('jumlah_kamar');
            $table->timestamps();
            $table->foreign('kode_booking')->references('id')->on('reservasis')->onDelete('CASCADE');
            $table->foreign('kode_kamar')->references('id')->on('kamars')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_reservasi_kamars');
    }
}
