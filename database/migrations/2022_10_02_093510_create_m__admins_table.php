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
        Schema::create('m__admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->bigInteger('no_hp');
            $table->string('alamat');
            $table->string('ktp_original')->nullable();
            $table->string('ktp_encrypt')->nullable();
            $table->string('karpeg_ktm_original')->nullable();
            $table->string('karpeg_ktm_encrypt')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__admins');
    }
};