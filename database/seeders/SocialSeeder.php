<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * @var array<int, string>|string[] $defaultSocials
     */
    private array $defaultSocials = [
        'facebook',
        'instagram',
        'telegram',
        'twitter',
        'google-plus',
        'skype',
        'youtube',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->defaultSocials as $defaultSocial) {
            Social::factory()->create([
                'slug' => $defaultSocial,
                'link' => $defaultSocial,
                'is_active' => true
            ]);
        }
    }
}
