<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_invoice',50);
            $table->integer('kode_staff')->unsigned();
            $table->date('tanggal_cetak_nota');
            $table->float('total_bayar_reservasi');
            $table->float('pajak');
            $table->float('total_keseluruhan');
            $table->float('uang_jaminan');
            $table->float('uang_deposit');
            $table->float('total_bayar');
            $table->integer('kode_booking')->unsigned();
            $table->integer('kode_transaksi')->unsigned();
            $table->timestamps();
            $table->foreign('kode_staff')->references('id')->on('staff')->onDelete('CASCADE');
            $table->foreign('kode_booking')->references('id')->on('reservasis')->onDelete('CASCADE');
            $table->foreign('kode_transaksi')->references('id')->on('transaksis')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
