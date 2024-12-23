<?php

use App\Models\User;
use App\Models\Pinjam;
use App\Models\Barang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_model_creation()
    {
        // Ambil user yang ada di database (misalnya user pertama)
        $user = \App\Models\User::first();

        // Memastikan user ada
        $this->assertInstanceOf(User::class, $user);
        $this->assertNotNull($user->name);
        $this->assertNotNull($user->email);
    }

    public function test_user_has_pinjams()
    {
        // Ambil user yang ada di database (misalnya user pertama)
        $user = \App\Models\User::first();
        $barang = Barang::create(['nama_barang' => 'Laptop', 'jumlah_barang_tersedia' => 10]);

        // Membuat peminjaman
        $pinjam = Pinjam::create([
            'user_id' => $user->user_id,
            'id_barang' => $barang->id_barang,
            'jumlah_barang_dipinjam' => 2,
            'tanggal_pinjam' => now(),
            'tanggal_pengembalian' => now()->addDays(7),
            'status' => 'Dipinjam'
        ]);

        // Memastikan user memiliki peminjaman terkait
        $this->assertEquals(1, $user->pinjams()->count());
        $this->assertEquals($pinjam->id_pinjam, $user->pinjams()->first()->id_pinjam);
    }
}
