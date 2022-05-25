<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * @var array $userPositons
     */
    private array $userPositons = [
        'Manager',
        'Accountant',
        'Chairman',
        'Co-Ordinator'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::factory()->create(['email' => 'admin@gmail.com', 'is_admin' => true] + $this->getUserPosition());

        for ($i=0; $i <= 10; $i++) { 
            \App\Models\User::factory()->create($this->getUserPosition());
        }
    }

    /**
     * @return array
     */
    private function getUserPosition(): array
    {
        $position = $this->userPositons[random_int(0, count($this->userPositons) - 1)];

        return [
            'position_en' => $position,
            'position_ru' => $position,
            'position_tk' => $position
        ];
    }
}
