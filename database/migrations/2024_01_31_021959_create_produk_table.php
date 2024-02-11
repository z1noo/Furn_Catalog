<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->string('link');
            $table->timestamps();
        });
    }
    public function down()
    {
        // Drop foreign key constraints if they exist
        Schema::table('like', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
        });
    
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
        });
    
        // Now drop the produk table
        Schema::dropIfExists('produk');
    }
    
    
    
}
