<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{

    /**
     * @var array<int, string> $testTags
     */
    private array $testTags = [
        '#test',
        '#news',
        '#logistics',
        '#cargo',
        '#ocean',
        '#management'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var Collection $users */
        $users = User::all();
        foreach ($this->testTags as $key => $value) {
            Tag::factory()->create(
                compact('value') + ['user_id' => $users->random(1)->first()->id]
            );
        }
    }
}
