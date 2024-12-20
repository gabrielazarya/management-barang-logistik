<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileAdditionalTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_update_validation_errors(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => '', // Invalid name
                'email' => 'invalid-email', // Invalid email
            ]);

        $response
            ->assertSessionHasErrors(['name', 'email']);
    }

    public function test_unauthenticated_user_cannot_access_profile_page(): void
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/login');
    }

    public function test_unauthenticated_user_cannot_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this->delete('/profile', [
            'password' => 'password',
        ]);

        $response->assertRedirect('/login');
        $this->assertNotNull($user->fresh());
    }

    public function test_authenticated_user_can_update_profile(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Updated User',
                'email' => 'updated@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Updated User', $user->name);
        $this->assertSame('updated@example.com', $user->email);
    }
}
