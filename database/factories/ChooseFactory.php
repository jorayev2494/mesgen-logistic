<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Choose>
 */
class ChooseFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'icon' => 'flaticon-internet',
            'position' => null,
            // 'is_active' => $this->faker->boolean,
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 15));
        $this->localization($data, 'text', $this->faker->realTextBetween(15, 45));

        return $data;
    }
}
