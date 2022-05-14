<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactSentMail;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

/**
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * @var ContactService $service
     */
    private ContactService $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    /**
     * @param StoreContactRequest $request
     * @return JsonResponse
     */
    public function contact(StoreContactRequest $request): JsonResponse
    {
        $result = $this->service->contact($request->validated());

        return response()->json($result, Response::HTTP_ACCEPTED);
    }
}
