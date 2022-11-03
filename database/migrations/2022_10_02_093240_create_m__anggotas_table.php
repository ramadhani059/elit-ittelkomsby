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
        Schema::create('m__anggotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jenis_keanggotaan');
            $table->unsignedBigInteger('id_institusi');
            $table->string('nama_lengkap');
            $table->bigInteger('no_hp');
            $table->string('alamat');
            $table->string('ktp_original')->nullable();
            $table->string('ktp_encrypt')->nullable();
            $table->string('karpeg_ktm_original')->nullable();
            $table->string('karpeg_ktm_encrypt')->nullable();
            $table->string('ijazah_original')->nullable();
            $table->string('ijazah_encrypt')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_jenis_keanggotaan')->references('id')->on('r__jenis__keanggotaans');
            $table->foreign('id_institusi')->references('id')->on('r__institusis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__anggotas');
    }
};
