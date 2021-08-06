<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_file_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peminjaman');
            $table->text('nama_file');
            $table->integer('status')->comment('1:Terbaru, 2:File Lama perlu diperbaiki');
            $table->timestamps();
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('tb_peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_peminjamen');
    }
}
