<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeternak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peternak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 60);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat', 160)->nullable();
            $table->string('foto', 160);
            $table->string('nohp', 20);
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
        Schema::dropIfExists('peternak');
    }
}
