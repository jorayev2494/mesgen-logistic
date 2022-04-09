<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
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
            'slug' => 'required|string|alpha|unique:countries,slug',
            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'title_tk' => 'required|string',
            'position' => 'integer|min:1',
            'is_active' => 'boolean'
        ];
    }
}
