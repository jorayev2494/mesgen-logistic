<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ModelMediaAttribute
{
    /**
     * @return Attribute
     */
    public function media(): Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(
            static fn (string $val): string => filter_var($val, FILTER_VALIDATE_URL) ?: env('APP_URL') . $val
        );
    }
}
