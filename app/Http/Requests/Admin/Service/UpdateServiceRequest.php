<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'media' => 'file|mimes:jpg,jpeg,png,gif',

            'title_en' => 'string|min:5|max:25',
            'title_ru' => 'string|min:5|max:25',
            'title_tk' => 'string|min:5|max:25',

            'text_en' => 'string|min:10|max:50',
            'text_ru' => 'string|min:10|max:50',
            'text_tk' => 'string|min:10|max:50',

            'is_active' => 'boolean',
            'position' => 'integer|min:1'
        ];
    }
}
