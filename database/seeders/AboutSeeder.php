<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        About::factory()->create();
    }
}
