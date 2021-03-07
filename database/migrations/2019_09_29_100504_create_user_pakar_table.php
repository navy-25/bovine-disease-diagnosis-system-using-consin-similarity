<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPakarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pakar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',50);
            $table->string('alamat');
            $table->string('bidang_keahlian');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('user_pakar');
    }
}
