<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCarts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_carts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_user');
            $table->integer('id_laboratorium');
            $table->enum('status',['disewa','batal','cart']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_laboratorium')->references('id_laboratorium')->on('tb_laboratorium');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_carts');
    }
}
