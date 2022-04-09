<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Country::all() as $country) {
            Phone::factory()->count(2)->create(['country_id' => $country->id]);
        }
    }
}
