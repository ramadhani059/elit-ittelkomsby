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
        Schema::create('t__peminjaman__bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_eksemplar');
            $table->unsignedBigInteger('id_anggota');
            $table->string('kode_booking')->unique();
            $table->string('jenis_identitas')->nullable();
            $table->string('nomor_identitas')->nullable();
            $table->string('nama_peminjam');
            $table->string('email_peminjam');
            $table->string('no_hp');
            $table->string('alamat_peminjam');
            $table->date('tgl_pinjam');
            $table->date('batas_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->integer('total_denda');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_eksemplar')->references('id')->on('m__eksemplars')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id')->on('m__anggotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t__peminjaman__bukus');
    }
};
