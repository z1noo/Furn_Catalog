<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeTable extends Migration
{
    public function up()
    {
        Schema::create('like', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('produk_id')->references('id')->on('produk');
            $table->foreign('user_id')->references('id')->on('user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('like_tb');
    }
}
