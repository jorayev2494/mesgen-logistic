<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkHour>
 */
class WorkHourFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'from' => '09:00',
            'to' => '18:00',
            'country_id' => 1,
            'position' => null,
            'is_active' => true,
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 15));

        return $data;
    }
}
