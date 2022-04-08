<?php

declare(strict_types=1);

namespace App\Services\Admin\Base;

use Illuminate\Support\Facades\Lang;

class BaseService
{
    /**
     * @param string $key
     * @param bool $forSQL
     * @return string
     */
    protected function getLocalPrefix(string $key, bool $forSQL = false): string
    {
        $currentLang = Lang::getLocale();

        $result = "{$key}_{$currentLang}";

        return $forSQL ? "{$result} as {$key}" : $result;

    }
}
