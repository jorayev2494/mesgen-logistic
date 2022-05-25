<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => "email|unique:users,email,{$this->route()->parameter('id')},id",
            'avatar' => 'file|mime_types:image/jpg,image/jpeg,image/png',
            'is_admin' => 'boolean',
            'position_en' => 'string',
            'position_ru' => 'string',
            'position_tk' => 'string',
            'is_active' => 'boolean',
            'position' => 'integer'
        ];
    }
}
