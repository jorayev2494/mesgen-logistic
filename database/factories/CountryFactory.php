<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'slug' => strtolower($country = $this->faker->century),
            'is_active' => true,
            'position' => null
        ];

        $this->localization($data, 'title', $country);

        return $data;
    }
}
