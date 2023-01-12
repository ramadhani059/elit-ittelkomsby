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
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->unsignedBigInteger('id_jenis_buku');
            $table->unsignedBigInteger('id_sirkulasi');
            $table->string('cover')->nullable();
            $table->string('kode_buku')->unique();
            $table->string('lokasi_buku')->nullable();
            $table->string('slug')->unique();
            $table->string('judul');
            $table->string('anak_judul')->nullable();
            $table->string('judul_inggris')->nullable();
            $table->string('edisi')->nullable();
            $table->string('penyunting')->nullable();
            $table->string('penerjemah')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('kota_terbit');
            $table->integer('tahun_terbit');
            $table->string('ilustrasi')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('isbn')->nullable();
            $table->text('ringkasan')->nullable();
            $table->boolean('status_active');
            $table->boolean('role_download');
            $table->timestamps();

            $table->foreign('id_prodi')->references('id')->on('m__prodis');
            $table->foreign('id_jenis_buku')->references('id')->on('r__jenis__bukus');
            $table->foreign('id_sirkulasi')->references('id')->on('r__sirkulasis');
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
