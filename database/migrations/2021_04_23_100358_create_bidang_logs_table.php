<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_bidang');
            $table->integer('id_user');
            $table->string('log_type');
            $table->text('nama_bidang')->nullable();
            $table->integer('status')->comment('nilai terbesar adalah data terbaru');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_bidang')->references('id_bidang')->on('tb_bidang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang_logs');
    }
}
