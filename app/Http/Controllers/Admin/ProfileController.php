<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    use \App\Traits\FileTrait;

    /**
     * @var \App\Models\User|null $authUser
     */
    private ?\App\Models\User $authUser;

    public function __construct() {
        $this->middleware('auth:api');
        $this->authUser = auth()->guard('api')->user();
    }

    /**
     * @return JsonResponse
     */
    public function getProfile(): JsonResponse
    {
        return response()->json($this->authUser);
    }

    /**
     * @param \App\Http\Requests\Admin\Profile\UpdateProfileRequest $request
     * @return JsonResponse
     */
    public function updateProfile(\App\Http\Requests\Admin\Profile\UpdateProfileRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (array_key_exists('avatar', $data)) {
            if ($avatar = $this->authUser->getRawOriginal('avatar')) {
                $this->deleteFile("/profile/{$this->authUser->id}/avatar", $avatar);
            }
            ['full_path' => $data['avatar']] = $this->uploadFile("/profile/{$this->authUser->id}/avatar", $data['avatar']);
        }

        $this->authUser->update($data);

        return response()->json($this->authUser, Response::HTTP_ACCEPTED);
    }

    
}
