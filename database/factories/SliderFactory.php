<?php

namespace Database\Factories;

use App\Http\Middleware\LangMiddleware;
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
        $data = [
            'media' => $this->faker->imageUrl(1920, 850),
            'is_active' => $this->faker->boolean,
            'extension' => "png",
            'position' => null
        ];

        $this->localization($data, 'title', $this->faker->realTextBetween(5, 20));
        $this->localization($data, 'text', $this->faker->text(30));

        return $data;
    }

    /**
     * @param array $data
     * @param string $key
     * @param string $value
     * @return void
     */
    private function localization(array &$data, string $key, string $value): void
    {
        foreach (LangMiddleware::LANG as $k => $val) {
            $data["{$key}_{$val}"] = strtoupper($val) . " " . $value;
        }
    }
}
