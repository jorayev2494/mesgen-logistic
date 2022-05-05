<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends BaseFactory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'position' => null,
            'is_active' => true,
        ];

        $this->localization($data, 'address', $this->faker->streetAddress());

        return $data;
    }
}
