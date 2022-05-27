<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TextTranslate>
 */
class TextTranslateFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $data = [
            'slug' => $this->faker->slug(2),
            'position' => null,
            'is_active' => true
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 15));
        $this->localization($data, 'text', $this->faker->realTextBetween(15, 45));

        return $data;
    }
}
