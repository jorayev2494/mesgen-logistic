<?php

namespace Database\Factories;

use Database\Factories\Base\BaseFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends BaseFactory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'media' => $this->faker->imageUrl(370, 345),
            // 'position' => null,
            'extension' => 'png',
            'is_active' => true
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 20));
        $this->localization($data, 'text', $this->faker->text(30));

        return $data;
    }
}
