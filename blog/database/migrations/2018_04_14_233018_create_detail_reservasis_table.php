<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_reservasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_booking')->unsigned();
            $table->integer('kode_kamar')->unsigned();
            $table->integer('jumlah_kamar');
            $table->integer('kode_tempat_tidur')->unsigned();
            $table->integer('jumlah_tempat_tidur');
            $table->integer('kode_fasilitas')->unsigned();
            $table->integer('jumlah_fasilitas');
            $table->float('total_bayar_reservasi');
            $table->timestamps();
            $table->foreign('kode_booking')->references('id')->on('reservasis')->onDelete('CASCADE');
            $table->foreign('kode_kamar')->references('id')->on('kamars')->onDelete('CASCADE');
            $table->foreign('kode_fasilitas')->references('id')->on('fasilitas')->onDelete('CASCADE');
            $table->foreign('kode_tempat_tidur')->references('id')->on('tempat_tidurs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_reservasis');
    }
}
