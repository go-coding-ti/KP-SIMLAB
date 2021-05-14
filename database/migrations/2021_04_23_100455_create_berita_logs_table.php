<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_berita');
            $table->integer('id_user');
            $table->string('log_type');
            $table->text('judul')->nullable();
            $table->text('isi')->nullable();
            $table->text('tanggal')->nullable();
            $table->integer('status')->comment('nilai terbesar adalah data terbaru');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_berita')->references('id_berita')->on('tb_berita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_logs');
    }
}
