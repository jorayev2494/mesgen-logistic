<?php

namespace Database\Seeders;

use App\Models\SliderBlock;
use Illuminate\Database\Seeder;

class SliderBlockSeeder extends Seeder
{
    /**
     * @var array|string[] $defaultTransports
     */
    private array $defaultTransports = [
        'flaticon-transport-3',
        'flaticon-transport-4',
        'flaticon-transport-5',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->defaultTransports as $defaultTransport) {
            SliderBlock::factory()->create([
                'icon' => $defaultTransport
            ]);
        }
    }
}
