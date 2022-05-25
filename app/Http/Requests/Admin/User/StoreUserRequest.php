<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'avatar' => 'file|mime_types:image/jpg,image/jpeg,image/png',
            'is_admin' => 'boolean',
            'position_en' => 'required|string',
            'position_ru' => 'required|string',
            'position_tk' => 'required|string',
            'is_active' => 'boolean',
            'position' => 'integer'
        ];
    }
}
