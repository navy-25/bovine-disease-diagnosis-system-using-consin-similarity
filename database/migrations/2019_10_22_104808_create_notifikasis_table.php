<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pesan', 250);
            $table->string('url', 250);
            $table->string('pengirim_alias', 60);
            $table->integer('dibaca')->length(1);
            $table->bigInteger('penerima_id')->unsigned();
            $table->bigInteger('pengirim_id')->unsigned();
            $table->timestamps();

            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pengirim_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasis');
    }
}
