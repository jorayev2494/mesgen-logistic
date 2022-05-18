<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSocialSeeder extends Seeder
{
    /**
     * @var array $userSocials
     */
    private array $userSocials = [
        'facebook' => 'https://facebook.com',
        'twitter' => 'https://twitter.com',
        'skype' => 'https://www.skype.com'
    ];

    /**
     * @return void
     */
    public function run(): void
    {
        $users = User::all();
        $userSocial = $this->makeUserSocials();

        /** @var User $user */
        foreach ($users as $key => $user) {
            $user->socials()->createMany($userSocial);
        }
    }

    /**
     * @return array
     */
    private function makeUserSocials(): array
    {
        $result = [];

        foreach ($this->userSocials as $key => $social) {
            $result[] = [
                'slug' => $key,
                'link' => $social
            ];
        }

        return $result;
    }
}
