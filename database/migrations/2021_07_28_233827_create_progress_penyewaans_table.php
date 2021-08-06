<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressPenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_progress_penyewaan', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_peminjaman');
            $table->text('progress_name')->nullable()->comment('Nama dari progress');
            $table->text('progress_detail')->nullable()->comment('Detail dari progress');
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
        Schema::dropIfExists('progress_penyewaans');
    }
}
