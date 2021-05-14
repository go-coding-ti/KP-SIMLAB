<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboranLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboran_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_laboran');
            $table->integer('id_user');
            $table->string('log_type');
            $table->text('hak_akses')->nullable();
            $table->integer('status')->comment('nilai terbesar adalah data terbaru');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_laboran')->references('id_laboran')->on('tb_laboran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboran_logs');
    }
}
