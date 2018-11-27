<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailReservasiFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_reservasi_fasilitas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_booking')->unsigned();
            $table->integer('kode_fasilitas')->unsigned();
            $table->integer('jumlah_fasilitas');
            $table->timestamps();
            $table->foreign('kode_booking')->references('id')->on('reservasis')->onDelete('CASCADE');
            $table->foreign('kode_fasilitas')->references('id')->on('fasilitas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_reservasi_fasilitas');
    }
}
