<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Country;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Country::all(['id'])->toArray() as $country) {
            Contact::factory(random_int(2, 7))->create([
                'country_id' => $country['id']
            ]);
        }
    }
}
