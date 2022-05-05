<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'media' => $this->faker->imageUrl(144, 45),
            'is_active' => true,
            'extension' => "png",
            'position' => null
        ];

        $this->localization($data, 'title', $this->faker->text);

        return $data;
    }
}
