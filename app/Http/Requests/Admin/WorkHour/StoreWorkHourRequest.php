<?php

namespace App\Http\Requests\Admin\WorkHour;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkHourRequest extends FormRequest
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
            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'title_tk' => 'required|string',

            'from' => 'required|string',
            'to' => 'required|string',
            'country_id' => 'required|integer|exists:countries,id',

            'position' => 'integer|min:1',
        ];
    }
}
