<?php

namespace Tests\Feature\Admin\Auth;

use Database\Seeders\UserTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

//    public function setUp(): void
//    {
//        $this->seed(UserTableSeeder::class);
//    }

    /**
     * @dataProvider adminCredentials
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function test_admin_auth(string $email, string $password): void
    {
        $this->seed(UserTableSeeder::class);
        $response = $this->postJson(route('admin.auth.login'), compact('email', 'password'));
        $response->assertOk();
        $this->assertAuthenticated('api');

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }

    /**
     * @return \string[][]
     */
    private function adminCredentials(): array
    {
        return [
            'admin' => ['email' => 'admin@gmail.com', 'password' => 'password']
        ];
    }

    /**
     * @return \string[][]
     */
    private function adminFailCredentials(): array
    {
        return [
            ['email' => 'invalid@gmail.com', 'password' => 'password'],
            ['email' => 'admin@gmail.com', 'password' => 'invalid']
        ];
    }
}
