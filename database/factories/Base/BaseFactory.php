<?php

namespace Database\Factories\Base;

use App\Http\Middleware\LangMiddleware;
use Illuminate\Database\Eloquent\Factories\Factory;

abstract class BaseFactory extends Factory
{
    /**
     * @param array $data
     * @param string $key
     * @param string $value
     * @return void
     */
    protected function localization(array &$data, string $key, string $value): void
    {
        foreach (LangMiddleware::LANG as $k => $val) {
            $data["{$key}_{$val}"] = strtoupper($val) . " " . $value;
        }
    }
}
