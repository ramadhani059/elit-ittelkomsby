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
        Schema::create('r__jenis__bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_koleksi');
            $table->string('nama');
            $table->boolean('role_file');
            $table->timestamps();

            $table->foreign('id_koleksi')->references('id')->on('r__koleksi__bukus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r__jenis__bukus');
    }
};
