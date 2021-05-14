<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_layanan');
            $table->integer('id_user');
            $table->string('log_type');
            $table->text('nama_layanan')->nullable();
            $table->text('satuan')->nullable();
            $table->text('harga')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('status')->comment('nilai terbesar adalah data terbaru');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_layanan')->references('id_layanan')->on('tb_layanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan_logs');
    }
}
