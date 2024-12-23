<?php

use App\Models\Barang;
use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BarangTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test apakah model barang ada di database
     *
     * Menggunakan barang yang sudah ada di database
     */
    public function test_barang_model_exists_in_database()
    {
        // Ambil barang pertama yang ada di database
        $barang = Barang::first();

        // Memastikan barang ada di database
        $this->assertNotNull($barang, "Barang tidak ditemukan di database.");
        $this->assertInstanceOf(Barang::class, $barang);
        $this->assertNotNull($barang->nama_barang);
        $this->assertNotNull($barang->tipe_barang);
        $this->assertNotNull($barang->jumlah_barang_tersedia);
    }

    /**
     * Test apakah barang memiliki relasi dengan pinjaman
     */
    public function test_barang_has_pinjams()
    {
        // Retrieve the Barang instance with the name "Kursi Lipat"
        $barang = Barang::where('nama_barang', 'Kursi Lipat')->first();

        // Pastikan ada barang di database
        $this->assertNotNull($barang, "Barang tidak ditemukan di database.");

        // Ambil user yang ada di database (misalnya user pertama)
        $user = User::factory()->create([
            'email' => 'dimas@gmail.com',
            'password' => bcrypt('dimas321'),
        ]);

        // Pastikan ada user di database
        $this->assertNotNull($user, "User tidak ditemukan di database.");

        // Membuat peminjaman menggunakan barang yang ada di database
        $pinjam = Pinjam::create([
            'user_id' => $user->id,
            'nama_barang' => $barang->nama_barang='Kursi Lipat',
            'jumlah_barang_dipinjam' => 2,
            'tanggal_pinjam' => now(),
            'tanggal_pengembalian' => now()->addDays(7),
            'status' => 'Dipinjam'
        ]);

        // Memastikan bahwa barang memiliki relasi dengan peminjaman yang terkait
        $this->assertEquals(1, $barang->pinjams()->count());
        $this->assertEquals($pinjam->id_pinjam, $barang->pinjams()->first()->id_pinjam);
    }
}
