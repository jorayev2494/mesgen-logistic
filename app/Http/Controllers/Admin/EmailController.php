<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Email\StoreEmailRequest;
use App\Http\Requests\Admin\Email\UpdateEmailRequest;
use App\Services\Admin\EmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailController extends RestApiController
{
    /**
     * @param EmailService $service
     */
    public function __construct(EmailService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param StoreEmailRequest $request
     * @return JsonResponse
     */
    public function store(StoreEmailRequest $request): JsonResponse
    {
        return $this->restApiStore($request);
    }

    /**
     * @param UpdateEmailRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateEmailRequest $request, int $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
