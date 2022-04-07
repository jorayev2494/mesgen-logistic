<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Auth\Restore;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\PasswordRestore\RestoreRequest;
use App\Http\Requests\Admin\Auth\PasswordRestore\SendCodeRequest;
use App\Services\Admin\Auth\Restore\PasswordRestoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * @className RestoreController
 * @package App\Http\Controllers\Admin\Auth\Restore
 */
class PasswordRestoreController extends Controller
{
    private PasswordRestoreService $service;

    public function __construct(PasswordRestoreService $service)
    {
        $this->service = $service;
    }

    /**
     * @param SendCodeRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function sendCode(SendCodeRequest $request): JsonResponse
    {
        $result = $this->service->sendCode($request->validated());

        return response()->json($result, Response::HTTP_ACCEPTED);
    }

    /**
     * @param RestoreRequest $request
     * @return Response
     */
    public function restore(RestoreRequest $request): Response
    {
        $this->service->restore($request->validated());

        return response()->noContent( Response::HTTP_ACCEPTED);
    }
}
