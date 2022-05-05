<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Admin\RestApiController;
use App\Http\Requests\Admin\About\UpdateAboutRequest;
use App\Services\AboutService;
use Illuminate\Http\JsonResponse;

class AboutController extends RestApiController
{

    /**
     * @param AboutService $service
     */
    public function __construct(AboutService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param UpdateAboutRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAboutRequest $request, int $id): JsonResponse
    {
        return response()->json(
            $this->service->update($id, $request->validated(), '/abouts/company/medias')
        );
    }
}
