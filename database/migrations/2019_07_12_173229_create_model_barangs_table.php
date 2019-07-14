<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Pengirim');
            $table->string('kodeResi');
            $table->string('Penerima');
            $table->string('alamatPenerima');
            $table->enum('status',['proses','diterima']);

            $table->integer('perusahaan_id')->unsigned()->unique();
            $table->foreign('perusahaan_id')->references("id")->on('perusahaan');

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
        Schema::dropIfExists('barang');
    }
}
