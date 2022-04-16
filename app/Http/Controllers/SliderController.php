<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\Admin\SliderService;
use Illuminate\Http\JsonResponse;

class SliderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SliderService $service): JsonResponse
    {
        $result = $service->index(auth()->check(), [
                            'media',
                            GetKeyByLocalePrefix::execute('title', true),
                            GetKeyByLocalePrefix::execute('text', true),
                            'extension',
                         ]);

        return response()->json($result);
    }
}
