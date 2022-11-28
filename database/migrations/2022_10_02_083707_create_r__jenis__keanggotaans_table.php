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
        Schema::create('r__jenis__keanggotaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->boolean('role_ktp');
            $table->boolean('role_karpeg_ktm');
            $table->boolean('role_ijazah');
            $table->boolean('role_download');
            $table->boolean('role_baca');
            $table->boolean('role_booking');
            $table->boolean('role_institusi');
            $table->boolean('role_add_institusi');
            $table->boolean('role_user');
            $table->integer('batas_booking');
            $table->integer('jumlah_pinjam');
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
        Schema::dropIfExists('r__jenis__keanggotaans');
    }
};
