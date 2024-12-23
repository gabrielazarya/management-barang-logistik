<?php

namespace Tests\Unit;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Mock Auth facade
        Auth::shouldReceive('check')
            ->andReturnUsing(function () {
                return true;
            });
    }

    public function test_middleware_allows_access_for_correct_role()
    {
        // Simulasikan user dengan role 'admin'
        Auth::shouldReceive('user')
            ->andReturn((object) ['role' => 'admin']);

        $middleware = new RoleMiddleware();

        $request = Request::create('/informasi', 'GET');

        $response = $middleware->handle($request, function ($request) {
            return response('OK', 200);
        }, 'admin');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_middleware_blocks_access_for_wrong_role()
    {
        // Simulasikan user dengan role 'user'
        Auth::shouldReceive('user')
            ->andReturn((object) ['role' => 'user']);

        $middleware = new RoleMiddleware();

        $request = Request::create('/informasi', 'GET');

        $response = $middleware->handle($request, function ($request) {
            return response('OK', 200);
        }, 'admin');

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('login'), $response->headers->get('Location'));
    }

    public function test_middleware_blocks_access_when_not_authenticated()
{
    // Simulasikan kondisi user tidak login
    Auth::shouldReceive('check')->andReturn(false);
    Auth::shouldReceive('user')->never(); // Pastikan user tidak dipanggil

    $middleware = new RoleMiddleware();

    $request = Request::create('/informasi', 'GET');

    $response = $middleware->handle($request, function ($request) {
        return response('OK', 200);
    }, 'admin');

    $this->assertEquals(302, $response->getStatusCode());
    $this->assertEquals(route('login'), $response->headers->get('Location'));
}
    public function test_middleware_allows_multiple_roles()
    {
        // Simulasikan user dengan role 'user'
        Auth::shouldReceive('user')
            ->andReturn((object) ['role' => 'user']);

        $middleware = new RoleMiddleware();

        $request = Request::create('/ketersediaan', 'GET');

        $response = $middleware->handle($request, function ($request) {
            return response('OK', 200);
        }, 'admin', 'user');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
