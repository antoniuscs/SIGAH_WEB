<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_booking',50);
            $table->integer('kode_customer')->unsigned();
            $table->integer('kode_staff')->unsigned();
            $table->integer('jumlah_dewasa');
            $table->integer('jumlah_anak');
            $table->date('tanggal_check_in');
            $table->date('tanggal_check_out');
            $table->date('tanggal_reservasi');
            $table->date('tanggal_pembayaran');
            $table->string('status_reservasi');
            $table->integer('kode_lokasi')->unsigned();
            $table->timestamps();
            $table->foreign('kode_lokasi')->references('id')->on('lokasis')->onDelete('CASCADE');
            $table->foreign('kode_customer')->references('id')->on('customers')->onDelete('CASCADE');
            $table->foreign('kode_staff')->references('id')->on('staff')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
}
