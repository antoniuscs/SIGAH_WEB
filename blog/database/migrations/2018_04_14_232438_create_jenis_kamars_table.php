<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jenis_kamar',100);
            $table->binary('gambar');
            $table->char('kode_jenis_kamar',6);
            $table->longText('detail_jenis_kamar');
            $table->integer('pilihan_tempat_tidur_1')->unsigned();
            $table->integer('pilihan_tempat_tidur_2')->unsigned();
            $table->integer('kapasitas');
            $table->double('harga_jenis_kamar');
            $table->timestamps();
            $table->foreign('pilihan_tempat_tidur_1')->references('id')->on('tempat_tidurs')->onDelete('CASCADE');
            $table->foreign('pilihan_tempat_tidur_2')->references('id')->on('tempat_tidurs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_kamars');
    }
}
