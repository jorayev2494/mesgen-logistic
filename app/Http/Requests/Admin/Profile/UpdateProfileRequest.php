<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guard('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $authUserId = auth()->guard('api')->id();

        return [
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => "email|unique:users,email,{$authUserId},id",
            'avatar' => 'file|mime_types:image/jpg,image/jpeg,image/png',
            'position_en' => 'string',
            'position_tk' => 'string',
            'position_ru' => 'string',
        ];
    }
}
