<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\Admin\CountryService;
use Illuminate\Http\JsonResponse;


class CountryController extends Controller
{
    /**
     * @param CountryService $request
     * @return JsonResponse
     */
    public function __invoke(CountryService $request): JsonResponse
    {
        $result = $request->index(auth()->check(), [
                                                    'id',
                                                    'slug',
                                                    GetKeyByLocalePrefix::execute('title', true),
                                                ]);

        return response()->json($result);
    }
}
