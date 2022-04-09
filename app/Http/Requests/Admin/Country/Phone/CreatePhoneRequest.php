<?php

namespace App\Http\Requests\Admin\Country\Phone;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhoneRequest extends FormRequest
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
            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'title_tk' => 'required|string',
            'value' => 'required|string',
            'country_id' => 'required|integer|exists:countries,id',
            'position' => 'integer|min:1',
            'is_active' => 'boolean',
        ];
    }
}
