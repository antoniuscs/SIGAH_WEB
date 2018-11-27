<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titel',10);
            $table->string('nama_depan',100);
            $table->string('nama_belakang',100);
            $table->string('nama_instansi',100);
            $table->longText('alamat');
            $table->string('nomor_identitas',20);
            $table->string('jenis_identitas',10);
            $table->string('negara_penerbit_identitas');
            $table->date('tanggal_lahir');
            $table->string('nomor_hp',15);
            $table->string('nomor_telp',15);
            $table->string('email',50)->unique();
            $table->string('password',16);
            $table->integer('status_peran')->unsigned();
            $table->foreign('status_peran')->references('id')->on('perans')->onDelete('CASCADE');  
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
        Schema::dropIfExists('customers');
    }
}
