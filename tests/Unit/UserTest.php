<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Barang;

class UserTest extends TestCase
{
    /** @test */
    public function a_user_can_login()
    {
        // Use the provided user credentials
        $response = $this->post('/login', [
            'email' => 'dimas@gmail.com',
            'password' => 'dimas321',
        ]);

        $this->assertAuthenticated(); // Check if the user is authenticated
        $response->assertRedirect('/ketersediaan'); // Redirect to the availability page after login
    }

    /** @test */
    public function a_user_has_a_role()
    {
        // Use the provided user credentials
        $user = User::where('email', 'dimas@gmail.com')->first();

        $this->assertNotNull($user);
        $this->assertEquals('user', $user->role); // Assuming the role field exists
    }

    /** @test */
    public function a_user_can_access_availability_page()
    {
        $response = $this->actingAs(User::where('email', 'dimas@gmail.com')->first())
                         ->get('/ketersediaan');

        $response->assertStatus(200); // Check if the response is successful
        $response->assertViewIs('view-user.ketersediaan'); // Check if the correct view is returned
    }

    /** @test */
    public function a_user_can_borrow_items()
    {
        $user = User::where('email', 'dimas@gmail.com')->first();
        $barang = Barang::first(); // Assuming there is at least one item in the database

        $response = $this->actingAs($user)->post('/pinjam', [
            'id_barang' => Barang::where('nama_barang', 'Kursi Lipat')->first()->id_barang, // Use the item with the specified name
            'jumlah_barang_dipinjam' => 5, // Use the specified quantity
            'tanggal_pinjam' => now()->toDateString(),
            'tanggal_pengembalian' => now()->addDays(7)->toDateString(),
        ]);

        $response->assertRedirect('/ketersediaan'); // Check if redirected to availability page
        $this->assertDatabaseHas('pinjams', [
            'user_id' => $user->id,
            'id_barang' => $barang->id_barang,
            'jumlah_barang_dipinjam' => 1,
        ]);
    }

    /** @test */
    public function a_user_can_view_borrowing_history()
    {
        $user = User::where('email', 'dimas@gmail.com')->first();

        $response = $this->actingAs($user)->get('/riwayat-peminjaman');

        $response->assertStatus(200); // Check if the response is successful
        $response->assertViewIs('view-user.riwayat'); // Check if the correct view is returned
    }
}
