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
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_file_place');
            $table->string('original_name');
            $table->string('encrypt_name');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('m__bukus');
            $table->foreign('id_file_place')->references('id')->on('r__file__places');
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
