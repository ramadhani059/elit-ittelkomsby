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
            $table->unsignedBigInteger('id_buku')->nullable();
            $table->unsignedBigInteger('id_donasi')->nullable();
            $table->unsignedBigInteger('id_file_place');
            $table->string('original_name');
            $table->string('encrypt_name');
            $table->string('location_path');
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('m__bukus')->onDelete('set null');
            $table->foreign('id_donasi')->references('id')->on('t__donasi__bukus')->onDelete('set null');
            $table->foreign('id_file_place')->references('id')->on('r__file__places')->onDelete('cascade');
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
