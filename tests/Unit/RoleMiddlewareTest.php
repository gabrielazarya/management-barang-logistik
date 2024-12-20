<?php

namespace Tests\Unit;

use App\Http\Middleware\RoleMiddleware;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_middleware_allows_access_for_authorized_user()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $request = Request::create('/admin', 'GET');
        $request->setUserResolver(fn() => $user);

        $middleware = new RoleMiddleware();
        $response = $middleware->handle($request, function ($request) {
            return response('Access granted', 200);
        }, 'admin');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Access granted', $response->getContent());
    }

    public function test_middleware_redirects_unauthorized_user()
    {
        $user = User::factory()->create(['role' => 'user']);

        $request = Request::create('/admin', 'GET');
        $request->setUserResolver(fn() => $user);

        $middleware = new RoleMiddleware();
        $response = $middleware->handle($request, function ($request) {
            return response('Access granted', 200);
        }, 'admin');

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('login'), $response->headers->get('Location'));
    }
}
