<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_barang');
            $table->string('admin_name')->nullable();
            $table->integer('jumlah_barang_dipinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_pengembalian');
            $table->enum('status', ['pending', 'ditolak', 'diterima'])->default('pending');
            $table->timestamps();
        
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
};
