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
        Schema::create('m__bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_penyunting');
            $table->unsignedBigInteger('id_subjek');
            $table->unsignedBigInteger('id_jenis_buku');
            $table->unsignedBigInteger('id_sirkulasi');
            $table->unsignedBigInteger('id_file');
            $table->string('kode_buku')->unique();
            $table->string('lokasi_buku');
            $table->string('judul')->unique();
            $table->string('anak_judul');
            $table->string('edisi')->nullable();
            $table->string('kota_terbit');
            $table->integer('tahun_terbit');
            $table->string('ilustrasi')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('isbn')->nullable();
            $table->text('ringkasan');
            $table->integer('dipinjam')->nullable();
            $table->boolean('status_active');
            $table->boolean('role_download');
            $table->timestamps();

            $table->foreign('id_penerbit')->references('id')->on('r__penerbits');
            $table->foreign('id_penyunting')->references('id')->on('m__penyuntings');
            $table->foreign('id_subjek')->references('id')->on('r__subjeks');
            $table->foreign('id_jenis_buku')->references('id')->on('r__jenis__bukus');
            $table->foreign('id_sirkulasi')->references('id')->on('r__sirkulasis');
            $table->foreign('id_file')->references('id')->on('r__files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__bukus');
    }
};
