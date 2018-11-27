<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_booking')->unsigned();
            $table->float('total_keseluruhan');
            $table->float('uang_deposit');
            $table->float('uang_jaminan');
            $table->date('tanggal_pembayaran');
            $table->string('jenis_pembayaran',50);
            $table->string('nomor_identitas_pembayaran',50);
            $table->float('total_bayar');
            $table->timestamps();
            $table->foreign('kode_booking')->references('id')->on('reservasis')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
