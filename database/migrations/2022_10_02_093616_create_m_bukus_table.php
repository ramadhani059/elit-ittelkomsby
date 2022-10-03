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
        Schema::create('m_bukus', function (Blueprint $table) {
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

            $table->foreign('id_admin')->references('id')->on('m_admins');
            $table->foreign('id_penerbit')->references('id')->on('r_penerbits');
            $table->foreign('id_pengarang')->references('id')->on('m_pengarangs');
            $table->foreign('id_penyunting')->references('id')->on('r_sirkulasis');
            $table->foreign('id_subjek')->references('id')->on('r_subjeks');
            $table->foreign('id_jenis_buku')->references('id')->on('r_jenis_bukus');
            $table->foreign('id_sirkulasi')->references('id')->on('r_sirkulasis');
            $table->foreign('id_file')->references('id')->on('r_files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_bukus');
    }
};
