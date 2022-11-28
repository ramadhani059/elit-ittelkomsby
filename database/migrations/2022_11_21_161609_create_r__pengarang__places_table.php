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
        Schema::create('r__pengarang__places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_pengarang');
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('m__bukus');
            $table->foreign('id_pengarang')->references('id')->on('m__pengarangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r__pengarang__places');
    }
};
