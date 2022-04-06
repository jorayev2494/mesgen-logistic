<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media' => $this->faker->imageUrl(1920, 850),
            'title' => $this->faker->realTextBetween(5, 20),
            'text' => $this->faker->text(30),
            'is_active' => $this->faker->boolean,
            'position' => null
        ];
    }
}
