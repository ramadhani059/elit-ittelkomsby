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
        Schema::create('r__file__places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenisbuku');
            $table->string('name');
            $table->string('note')->nullable();
            $table->string('type');
            $table->timestamps();

            $table->foreign('id_jenisbuku')->references('id')->on('r__jenis__bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r__file__places');
    }
};
