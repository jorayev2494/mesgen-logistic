<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'media' => $this->faker->imageUrl(870, 453),
            'is_active' => true,
            'extension' => "png",
            'position' => null
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 20));
        $this->localization($data, 'text', $this->faker->text(30));

        return $data;
    }
}
