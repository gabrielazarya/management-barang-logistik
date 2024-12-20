<?php

namespace Tests\Unit;

use Tests\TestCase;

class GuestControllerTest extends TestCase
{
    public function test_guest_can_access_homepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_guest_can_access_about_page()
    {
        $response = $this->get('/tentang');
        $response->assertStatus(200);
    }

    public function test_guest_cannot_access_profile()
    {
        $response = $this->get('/profile');
        $response->assertRedirect('/login'); // Assuming the login route is '/login'
    }
}
