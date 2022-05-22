<?php

namespace Database\Seeders;

use App\Models\AboutStep;
use Illuminate\Database\Seeder;

class AboutStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AboutStep::factory(3)->create();
    }
}
