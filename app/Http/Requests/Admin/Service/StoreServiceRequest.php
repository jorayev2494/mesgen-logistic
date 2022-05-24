<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'media' => 'required|file|mimes:jpg,jpeg,png,gif',

            'title_en' => 'required|string|min:5|max:25|unique:services,title_en',
            'title_ru' => 'required|string|min:5|max:25|unique:services,title_ru',
            'title_tk' => 'required|string|min:5|max:25|unique:services,title_tk',

            'text_en' => 'required|string|min:10|max:50|unique:services,text_en',
            'text_ru' => 'required|string|min:10|max:50|unique:services,text_ru',
            'text_tk' => 'required|string|min:10|max:50|unique:services,text_tk',

            'is_active' => 'boolean',
            'position' => 'integer|min:1'
        ];
    }
}
