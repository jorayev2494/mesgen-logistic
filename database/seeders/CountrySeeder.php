<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    private array $defaultCountries = [
        'America',
        'Russia',
        'Turkmenistan'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->defaultCountries as $defaultCountry) {
            Country::factory()->create(['slug' => strtolower($defaultCountry)]);
        }
    }
}
