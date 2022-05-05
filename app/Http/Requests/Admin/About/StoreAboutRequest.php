<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'media' => 'required|file|mimes:jpg,jpeg,png,gif',

            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'title_tk' => 'required|string',

            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'text_tk' => 'required|string',

            # 'is_active' => 'boolean',
            # 'position' => 'integer|min:1'
        ];
    }
}
