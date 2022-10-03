<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_anggota');
            $table->string('kode_booking');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_kembali');
            $table->integer('total_denda');
            $table->string('jenis_jaminan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('m_bukus');
            $table->foreign('id_anggota')->references('id')->on('m_anggotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_peminjaman');
    }
};
