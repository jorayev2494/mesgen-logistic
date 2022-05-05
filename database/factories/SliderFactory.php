<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'media' => $this->faker->imageUrl(1920, 850),
            'is_active' => true,
            'extension' => "png",
            'position' => null
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 20));
        $this->localization($data, 'text', $this->faker->text(30));

        return $data;
    }
}
