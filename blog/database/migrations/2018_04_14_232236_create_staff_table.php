<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_staff',5);
            $table->string('nama_depan',100);
            $table->string('nama_belakang',100);
            $table->char('jenis_kelamin',1);
            $table->longText('alamat');
            $table->string('nomor_identitas',20);
            $table->string('jenis_identitas',10);
            $table->string('negara_penerbit_identitas');
            $table->string('nomor_hp',15);
            $table->string('nomor_telp',15);
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('kode_lokasi')->unsigned();
            $table->integer('status_peran')->unsigned();
			$table->foreign('status_peran')->references('id')->on('perans')->onDelete('CASCADE');
            $table->foreign('kode_lokasi')->references('id')->on('lokasis')->onDelete('CASCADE');
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
        Schema::dropIfExists('staff');
    }
}
