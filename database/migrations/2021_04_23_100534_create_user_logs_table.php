<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_user_data');
            $table->integer('id_user');
            $table->string('log_type');
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('alamat')->nullable();
            $table->text('no_hp')->nullable();
            $table->integer('status')->comment('nilai terbesar adalah data terbaru');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_user_data')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logs');
    }
}
