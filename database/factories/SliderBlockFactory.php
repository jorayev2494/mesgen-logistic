<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SliderBlock>
 */
class SliderBlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => 'flaticon-transport-3',

            'title_en' => $this->faker->realTextBetween(5, 15),
            'title_ru' => $this->faker->realTextBetween(5, 15),
            'title_tk' => $this->faker->realTextBetween(5, 15),

            'text_en' => $this->faker->realTextBetween(15, 45),
            'text_ru' => $this->faker->realTextBetween(15, 45),
            'text_tk' => $this->faker->realTextBetween(15, 45),

            'position' => null,
        ];
    }
}
