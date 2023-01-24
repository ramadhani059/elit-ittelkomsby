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
        Schema::create('t__donasi__bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_jenis_buku');
            $table->string('cover')->nullable();
            $table->string('judul');
            $table->string('anak_judul')->nullable();
            $table->string('judul_inggris')->nullable();
            $table->string('edisi')->nullable();
            $table->integer('jml_eksemplar');
            $table->string('penyunting')->nullable();
            $table->string('penerjemah')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('kota_terbit');
            $table->integer('tahun_terbit');
            $table->string('ilustrasi')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('isbn')->nullable();
            $table->text('ringkasan')->nullable();
            $table->string('status_donasi');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_prodi')->references('id')->on('m__prodis')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id')->on('m__anggotas')->onDelete('cascade');
            $table->foreign('id_jenis_buku')->references('id')->on('r__jenis__bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t__donasi__bukus');
    }
};
