<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbautStep>
 */
class AboutStepFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data =  [
            'char_en' => 'E',
            'char_ru' => 'R',
            'char_tk' => 'T',
            'position' => null,
            'is_active' => true
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 20));
        $this->localization($data, 'text', $this->faker->text(55));

        return $data;
    }
}
