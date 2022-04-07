<?php

declare(strict_types=1);

namespace App\Services\Admin\Auth\Restore;

use App\Mail\Admin\Auth\Restore\RestoreCodeEmail;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class PasswordRestoreService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    #[NoReturn]
    public function sendCode(array $data): array
    {
        $foundAdmin = $this->userRepository->whereBy('email', $data['email'], ['id', 'email']);
        Mail::to($foundAdmin)->send(new RestoreCodeEmail($devCode = $foundAdmin->generateEmailCode()));

        return getenv('APP_ENV') != 'prod' ? ['dev_email_code' => $devCode] : [];
    }

    /**
     * @param array $data
     * @return void
     */
    #[NoReturn]
    public function restore(array $data): void
    {
        /** @var User $foundAdmin */
        $foundAdmin = $this->userRepository->whereBy('email_code', $data['email_code'], ['id', 'email_code']);

        if (((int) $data['email_code']) !== $foundAdmin->email_code) {
            throw new BadRequestException('Invalid email code');
        }

        $foundAdmin->password = $data['new_password'];
        $foundAdmin->email_code = null;
        $foundAdmin->save();
    }
}
