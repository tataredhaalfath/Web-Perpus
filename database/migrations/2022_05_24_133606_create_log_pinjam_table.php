<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pinjam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_buku');
            $table->foreign('id_buku')->references('id')->on('buku');
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('anggota');
            $table->date('tanggal_pinjam');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pinjam');
    }
}
