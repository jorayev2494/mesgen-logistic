<?php

namespace App\Http\Requests\Admin\Auth\PasswordRestore;

use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email_code' => 'required|integer|exists:users,email_code',
            'current_password' => 'required|string|min:6|max:20',
            'new_password' => 'required|string|min:6|max:20|confirmed'
        ];
    }
}
