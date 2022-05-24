<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * @var array $defaultIcons
     */
    private array $defaultIcons = [
        'flaticon-open-cardboard-box',
        'flaticon-transport-9',
        'flaticon-transport-2',
        'flaticon-buildings',
        'flaticon-international-delivery',
        'flaticon-transport-1',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->defaultIcons as $key => $icon) {
            Step::factory()->create(compact('icon'));
        }
    }
}
