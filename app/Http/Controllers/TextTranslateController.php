<?php

namespace App\Http\Controllers;

use App\Services\TextTranslateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TextTranslateController extends Controller
{

    public function __construct(
        private TextTranslateService $service
    )
    {
        
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->service->getTextTranslate($request->query->get('slug'));

        return response()->json($result);
    }
}
