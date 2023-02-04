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
        Schema::create('m__information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->string('judul');
            $table->text('isi')->nullable();
            $table->date('tanggal');
            $table->string('img_original');
            $table->string('img_encrypt');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_admin')->references('id')->on('m__admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__information');
    }
};
