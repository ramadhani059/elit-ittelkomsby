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
        Schema::create('r_sirkulasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('batas_booking');
            $table->integer('biaya_sewa');
            $table->integer('denda_harian');
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
        Schema::dropIfExists('r_sirkulasis');
    }
};
