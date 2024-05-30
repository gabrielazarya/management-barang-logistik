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
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->unsignedBigInteger('id_barang')->constrained('barangs');            
            $table->integer('jumlah_barang_dipinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_pengembalian');
            $table->enum('status', ['pending', 'tolak', 'terima'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
};
