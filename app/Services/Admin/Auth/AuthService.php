<?php

declare(strict_types=1);

namespace App\Services\Admin\Auth;

use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthService
{

    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $credentials
     * @return array
     */
    public function login(array $credentials): array
    {
        if (!$token = auth()->attempt($credentials)) {
            throw new BadRequestException('Invalid credentials');
        }

        return $this->generateAccessToken((string) $token);
    }

    /**
     * @param string $token
     * @return string[]
     */
    public function generateAccessToken(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
