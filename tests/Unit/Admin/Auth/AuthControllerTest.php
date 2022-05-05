<?php

namespace Tests\Unit\Admin\Auth;

use App\Services\Admin\Auth\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider adminCredentialsProvider
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function test_admin_auth(string $email, string $password): void
    {
        $authService = $this->createMock(AuthService::class);
        $authService->expects($this->once())->method('generateAccessToken');

        $res = $authService->login(compact('email', 'password'));

        $this->assertTrue(true);
    }

    /**
     * @dataProvider adminFailCredentials
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function test_exception_admin_auth(string $email, string $password): void
    {
        // $this->seed(UserTableSeeder::class);
        // $this->expectException(BadRequestException::class);
        // $this->expectExceptionMessage('Invalid credentials');

        $response = $this->postJson(
                            route('admin.auth.login'),
                            compact('email', 'password')
                        );
        // $response->dd();
        // $response->assertOk();
        $response->assertStatus(400);
    }

    /**
     * @return \string[][]
     */
    private function adminCredentialsProvider(): array
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
