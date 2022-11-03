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
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_pengarang');
            $table->unsignedBigInteger('id_penyunting');
            $table->unsignedBigInteger('id_subjek');
            $table->unsignedBigInteger('id_jenis_buku');
            $table->unsignedBigInteger('id_sirkulasi');
            $table->unsignedBigInteger('id_file');
            $table->string('kode_buku');
            $table->string('judul');
            $table->integer('tahun_terbit');
            $table->text('ringkasan');
            $table->integer('jumlah');
            $table->integer('dipinjam');
            $table->boolean('status_active');
            $table->boolean('role_download');
            $table->string('file_pdf')->nullable();
            $table->string('cover_original')->nullable();
            $table->string('cover_encrypt')->nullable();
            $table->timestamps();

            $table->foreign('id_admin')->references('id')->on('m__admins');
            $table->foreign('id_penerbit')->references('id')->on('r__penerbits');
            $table->foreign('id_pengarang')->references('id')->on('m__pengarangs');
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
