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
        Schema::create('r__pembimbing__places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_buku')->nullable();
            $table->unsignedBigInteger('id_donasi')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('id_donasi')->references('id')->on('t__donasi__bukus');
            $table->foreign('id_buku')->references('id')->on('m__bukus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r__pembimbing__places');
    }
};
