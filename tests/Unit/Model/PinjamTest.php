<?php

use App\Models\Pinjam;
use App\Models\Barang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PinjamTest extends TestCase
{
    use RefreshDatabase;

    public function test_pinjam_model_creation()
    {
        // Ambil user yang ada di database (misalnya user pertama)
        $user = \App\Models\User::first();
        $barang = Barang::where('nama_barang', 'Laptop')->first();
        $this->assertNotNull($barang, "Barang 'Laptop' tidak ditemukan di database.");

        // Membuat peminjaman
        $pinjam = Pinjam::create([
            'user_id' => $user->user_id,
            'id_barang' => $barang->id_barang,
            'jumlah_barang_dipinjam' => 2,
            'tanggal_pinjam' => now(),
            'tanggal_pengembalian' => now()->addDays(7),
            'status' => 'Dipinjam'
        ]);

        // Memastikan peminjaman tercatat dengan benar
        $this->assertInstanceOf(Pinjam::class, $pinjam);
        $this->assertEquals($user->user_id, $pinjam->user_id);
        $this->assertEquals($barang->id_barang, $pinjam->id_barang);
        $this->assertEquals(2, $pinjam->jumlah_barang_dipinjam);
    }

    public function test_pinjam_belongs_to_user_and_barang()
    {
        // Ambil user yang ada di database (misalnya user pertama)
        $user = \App\Models\User::first();
        $barang = Barang::create(['nama_barang' => 'Laptop', 'jumlah_barang_tersedia' => 10]);

        // Membuat peminjaman
        $pinjam = Pinjam::create([
            'user_id' => $user->user_id,
            'id_barang' => $barang->id_barang,
            'jumlah_barang_dipinjam' => 3,
            'tanggal_pinjam' => now(),
            'tanggal_pengembalian' => now()->addDays(7),
            'status' => 'Dipinjam'
        ]);

        // Memastikan peminjaman terkait dengan user dan barang
        $this->assertInstanceOf(\App\Models\User::class, $pinjam->user);
        $this->assertInstanceOf(\App\Models\Barang::class, $pinjam->barang);
    }
}
