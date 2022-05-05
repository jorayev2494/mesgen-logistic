<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'value' => $this->faker->phoneNumber,

            'country_id' => 1,
            'position' => null,
            'is_active' => true,
        ];

        $this->localization($data, 'title', $this->faker->address);

        return  $data;
    }
}
