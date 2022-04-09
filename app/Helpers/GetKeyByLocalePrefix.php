<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Lang;

class GetKeyByLocalePrefix
{
    /**
     * @param string $key
     * @param bool $forSQL
     * @return string
     */
    public static function execute(string $key, bool $forSQL = false): string
    {
        $currentLang = Lang::getLocale();

        $result = "{$key}_{$currentLang}";

        return $forSQL ? "{$result} as {$key}" : $result;
    }
}
