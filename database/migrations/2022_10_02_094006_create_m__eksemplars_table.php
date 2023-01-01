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
        Schema::create('m__eksemplars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_buku');
            $table->string('barcode');
            $table->string('kode_inventaris');
            $table->date('tanggal_pengadaan');
            $table->string('jenis_sumber');
            $table->string('status');
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
        Schema::dropIfExists('m__eksemplars');
    }
};
