<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
            'media' => 'file|mimes:jpg,jpeg,png,gif',

            'title_en' => 'string',
            'title_ru' => 'string',
            'title_tk' => 'string',

            'text_en' => 'string',
            'text_ru' => 'string',
            'text_tk' => 'string',

            # 'is_active' => 'boolean',
            # 'position' => 'integer|min:1'
        ];
    }
}
