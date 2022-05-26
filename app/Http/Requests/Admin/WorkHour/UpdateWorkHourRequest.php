<?php

namespace App\Http\Requests\Admin\WorkHour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkHourRequest extends FormRequest
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
            'title_en' => 'string',
            'title_ru' => 'string',
            'title_tk' => 'string',

            'from' => 'string',
            'to' => 'string',
            'country_id' => 'integer|exists:countries,id',

            'is_active' => 'boolean',
            'position' => 'integer|min:1',
        ];
    }
}
