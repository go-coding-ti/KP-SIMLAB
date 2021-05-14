<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriumLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorium_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_laboratorium');
            $table->integer('id_user');
            $table->string('log_type');
            $table->text('nama_lab')->nullable();
            $table->text('alamat')->nullable();
            $table->text('no_telp')->nullable();
            $table->text('foto_lab')->nullable();
            $table->integer('status')->comment('nilai terbesar adalah data terbaru');
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
        Schema::dropIfExists('laboratorium_logs');
    }
}
