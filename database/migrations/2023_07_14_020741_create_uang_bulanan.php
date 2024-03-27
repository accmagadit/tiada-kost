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
        Schema::create('uang_bulanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penghuni_id');
            $table->foreignId('id_tipe_pembayaran');
            $table->string('tanggal_transaksi');
            $table->string('deskripsi');
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
        Schema::dropIfExists('uang_bulanan');
    }
};
