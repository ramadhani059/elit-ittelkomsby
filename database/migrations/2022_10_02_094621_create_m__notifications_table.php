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
        Schema::create('m__notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user_pengirim')->nullable();
            $table->unsignedBigInteger('id_user_penerima')->nullable();
            $table->string('tipe_penerima');
            $table->string('subject');
            $table->text('deskripsi');
            $table->string('source')->nullable();
            $table->boolean('status_baca');
            $table->dateTime('tanggal');
            $table->timestamps();

            $table->foreign('id_user_pengirim')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_penerima')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__notifications');
    }
};
