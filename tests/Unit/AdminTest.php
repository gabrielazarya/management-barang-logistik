<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Barang;
use App\Models\Pinjam; // Ensure Pinjam model is imported
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function actingAsAdmin()
    {
        $admin = User::factory()->create(['role' => 'admin', 'email' => 'mop@gmail.com', 'password' => bcrypt('mop321')]);
        $this->actingAs($admin);
    }

    public function test_admin_can_access_informasi_page()
    {
        $this->actingAsAdmin();
        $response = $this->get('/informasi');
        $response->assertStatus(200);
    }

    public function test_admin_can_access_add_page()
    {
        $this->actingAsAdmin();
        $response = $this->get('/tambah');
        $response->assertStatus(200);
    }

    public function test_admin_cannot_access_profile_without_authentication()
    {
        $response = $this->get('/profile');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_add_barang()
    {
        $this->actingAsAdmin();

        $response = $this->post('/tambah', [
            'nama_barang' => 'Barang Contoh',
            'tipe_barang' => 'Elektronik',
            'jumlah_barang_tersedia' => 10,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/informasi');
        $this->assertDatabaseHas('barangs', [
            'nama_barang' => 'Barang Contoh',
            'tipe_barang' => 'Elektronik',
            'jumlah_barang_tersedia' => 10,
        ]);
    }

    public function test_user_can_check_availability_of_specific_item_within_time_range()
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->actingAs($user);
        
        $itemId = 1; // Replace with the actual item ID you want to test
        $startDate = '2024-05-01';
        $endDate = '2024-05-30';

        $response = $this->get("/ketersediaan?item_id={$itemId}&start_date={$startDate}&end_date={$endDate}");
        $response->assertStatus(200);
    }

    public function test_admin_can_delete_barang()
    {
        $this->actingAsAdmin();

        $barang = Barang::where('nama_barang', 'Kursi Lipat')->first(); // Find the barang by name

        $response = $this->delete("/barang/nama/{$barang->nama_barang}"); // Delete by name

        $response->assertStatus(302);
        $this->assertDeleted($barang);
    }

    public function test_admin_cannot_access_add_barang_page_without_authentication()
    {
        $response = $this->get('/tambah');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_access_konfirmasi_page()
    {
        $this->actingAsAdmin();
        $response = $this->get('/konfirmasi');
        $response->assertStatus(200);
    }

    public function test_admin_can_confirm_pinjaman()
    {
        $this->actingAsAdmin();

        // Create a sample borrowing request
        $pinjaman = Pinjam::factory()->create([
            'id_barang' => 1, // Replace with a valid barang ID
            'user_id' => 1, // Replace with a valid user ID
            'status' => 'pending', // Assuming the initial status is 'pending'
        ]);

        // Perform the confirm request
        $response = $this->post("/pinjaman/{$pinjaman->id}/confirm"); // Assuming the confirm route is '/pinjaman/{id}/confirm'

        // Assert the response status
        $response->assertStatus(302); // Assuming it redirects after confirmation

        // Assert the borrowing request has been confirmed in the database
        $this->assertDatabaseHas('pinjams', [
            'id' => $pinjaman->id,
            'status' => 'confirmed', // Assuming there is a status field
        ]);
    }

    public function test_admin_can_reject_pinjaman()
    {
        $this->actingAsAdmin();

        // Create a sample borrowing request
        $pinjaman = Pinjam::factory()->create([
            'id_barang' => 1, // Replace with a valid barang ID
            'user_id' => 1, // Replace with a valid user ID
            'status' => 'pending', // Assuming the initial status is 'pending'
        ]);

        // Perform the reject request
        $response = $this->post("/pinjaman/{$pinjaman->id}/reject"); // Assuming the reject route is '/pinjaman/{id}/reject'

        // Assert the response status
        $response->assertStatus(302); // Assuming it redirects after rejection

        // Assert the borrowing request has been rejected in the database
        $this->assertDatabaseHas('pinjams', [
            'id' => $pinjaman->id,
            'status' => 'rejected', // Assuming there is a status field
        ]);
    }

    public function test_admin_can_access_riwayat_page()
    {
        $this->actingAsAdmin();
        $response = $this->get('/riwayat');
        $response->assertStatus(200);
    }

    public function test_admin_can_edit_barang()
    {
        $this->actingAsAdmin();

        $barang = Barang::factory()->create([
            'nama_barang' => 'Barang Contoh',
            'tipe_barang' => 'Elektronik',
            'jumlah_barang_tersedia' => 10,
        ]);

        $response = $this->put("/barang/{$barang->id}", [
            'nama_barang' => 'Barang Diedit',
            'tipe_barang' => 'Elektronik',
            'jumlah_barang_tersedia' => 15,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('barangs', [
            'id_barang' => $barang->id,
            'nama_barang' => 'Barang Diedit',
            'tipe_barang' => 'Elektronik',
            'jumlah_barang_tersedia' => 15,
        ]);
    }

    // Updated test for admin profile editing
    public function test_admin_can_edit_own_profile()
    {
        $admin = User::factory()->create(['role' => 'admin', 'name' => 'Old Admin Name', 'email' => 'admin@example.com']);
        $this->actingAs($admin);

        $response = $this->put("/profile/{$admin->id}", [
            'name' => 'New Admin Name',
            'email' => 'newadmin@example.com',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'id' => $admin->id,
            'name' => 'New Admin Name',
            'email' => 'newadmin@example.com',
        ]);
    }

    public function test_admin_cannot_edit_user_profile_with_invalid_data()
    {
        $this->actingAsAdmin();

        $user = User::factory()->create();

        $response = $this->put("/profile/{$user->id}", [
            'name' => '', // Invalid name
            'email' => 'invalid-email', // Invalid email
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
    }
}
