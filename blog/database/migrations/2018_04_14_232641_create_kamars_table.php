<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_kamar',10);
            $table->integer('kode_jenis_kamar')->unsigned();
            $table->char('nomor_kamar',3);
            $table->char('nomor_lantai',2);
            $table->integer('status_season')->unsigned();
            $table->float('harga_kamar');
            $table->integer('kode_lokasi')->unsigned();
            $table->char('status_smoking',1);
            $table->foreign('kode_jenis_kamar')->references('id')->on('jenis_kamars')->onDelete('CASCADE');
            $table->foreign('kode_lokasi')->references('id')->on('lokasis')->onDelete('CASCADE');
            $table->foreign('status_season')->references('id')->on('seasons')->onDelete('CASCADE');
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
        Schema::dropIfExists('kamars');
    }
}
