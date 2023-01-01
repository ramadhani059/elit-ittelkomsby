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
        Schema::create('r__subjek__places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_buku');
            $table->string('nama');
            $table->timestamps();

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
        Schema::dropIfExists('r__subjek__places');
    }
};
