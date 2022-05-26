<?php

namespace Database\Seeders;

use App\Models\Choose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChooseSeeder extends Seeder
{
    /**
     * @var array $defaultIcons
     */
    private array $defaultIcons = [
        'flaticon-international-delivery',
        'flaticon-people',
        'flaticon-route',
        'flaticon-open-cardboard-box',
        'flaticon-alarm-clock',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach($this->defaultIcons as $key => $icon) {
            Choose::factory()->create(compact('icon'));
        }
    }
}
