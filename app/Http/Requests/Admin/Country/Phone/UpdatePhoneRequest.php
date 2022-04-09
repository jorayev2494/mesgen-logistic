<?php

namespace App\Http\Requests\Admin\Country\Phone;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhoneRequest extends FormRequest
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
            'title_en' => 'string',
            'title_ru' => 'string',
            'title_tk' => 'string',
            'value' => 'string',
            'country_id' => 'integer|exists:countries,id',
            'position' => 'integer|min:1',
            'is_active' => 'boolean',
        ];
    }
}
