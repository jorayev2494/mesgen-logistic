<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
            'slug' => "string|alpha|unique:countries,slug,{$this->route('country')},id",
            'title_en' => 'string',
            'title_ru' => 'string',
            'title_tk' => 'string',
            'position' => 'integer|min:1',
            'is_active' => 'boolean'
        ];
    }
}
