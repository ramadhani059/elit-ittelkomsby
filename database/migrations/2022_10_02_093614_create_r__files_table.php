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
        Schema::create('r__files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cover_laporan')->nullable();
            $table->string('disclimer')->nullable();
            $table->string('lembar_pengesahan')->nullable();
            $table->string('file_abstrak')->nullable();
            $table->string('lembar_persembahan')->nullable();
            $table->string('kata_pengantar')->nullable();
            $table->string('daftar_isi')->nullable();
            $table->string('daftar_tabel')->nullable();
            $table->string('bab_1')->nullable();
            $table->string('bab_2')->nullable();
            $table->string('bab_3')->nullable();
            $table->string('bab_4')->nullable();
            $table->string('bab_5')->nullable();
            $table->string('bab_6')->nullable();
            $table->string('bab_7')->nullable();
            $table->string('daftar_pustaka')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('materi_presentasi')->nullable();
            $table->string('proposal')->nullable();
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
        Schema::dropIfExists('r__files');
    }
};
