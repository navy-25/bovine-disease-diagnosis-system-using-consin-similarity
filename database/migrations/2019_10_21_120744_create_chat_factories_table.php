<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatFactoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_factories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode', 20);
            $table->text('pertanyaan');
            $table->integer('status')->length(1);
            $table->bigInteger('pakar_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("pakar_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_factories');
    }
}
