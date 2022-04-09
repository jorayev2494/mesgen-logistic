<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SliderBlock>
 */
class SliderBlockFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'icon' => 'flaticon-transport-3',
            'position' => null,
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 15));
        $this->localization($data, 'text', $this->faker->realTextBetween(15, 45));

        return $data;
    }
}
