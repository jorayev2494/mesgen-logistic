<?php

namespace App\Http\Requests\Admin\Email;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'email|unique:emails,email',
            'position' => 'integer|min:1',
            'is_active' => 'boolean',
        ];
    }
}
