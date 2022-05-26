<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * @var array $defaultIcons
     */
    private array $defaultIcons = [
        'flaticon-internet',
        'flaticon-shield',
        'flaticon-technology',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->defaultIcons as $key => $icon) {
            Process::factory()->create(compact('icon'));
        }
    }
}
