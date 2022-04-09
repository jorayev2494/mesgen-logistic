<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Country;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Country::all() as $country) {
            Address::factory()->count(4)->create(['country_id' => $country->id]);
        }
    }
}
