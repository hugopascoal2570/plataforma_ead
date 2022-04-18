<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use UtilsTrait;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fail_auth()
    {
        $response = $this->postJson('/auth', []);

        $response->assertStatus(422);
    }
    public function test_auth()
    {
        $user = User::factory()->create();
        $response = $this->postJson('/auth', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'teste'
        ]);
        $response->assertStatus(200);
    }

    public function test_error_logout()
    {
        $response = $this->postJson('/logout');
        $response->assertStatus(401);
    }
    public function test_logout()
    {
        $token = $this->createTokenUser();

        $response = $this->postJson('/logout', [], [
            'Authorization' => "Bearer {$token}",
        ]);
        $response->assertStatus(200);
    }

    public function test_error_get_met()
    {
        $response = $this->getJson('/me');

        $response->assertStatus(401);
    }

    public function test_get_met()
    {


        $token = $this->createTokenUser();
        $response = $this->getJson('/me', [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(200);
    }
}
