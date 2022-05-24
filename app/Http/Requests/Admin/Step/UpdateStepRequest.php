<?php

namespace App\Http\Requests\Admin\Step;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStepRequest extends FormRequest
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
            // 'icon' => 'required',
            'title_en' => 'string',
            'title_ru' => 'string',
            'title_tk' => 'string',

            'text_en' => 'string',
            'text_ru' => 'string',
            'text_tk' => 'string',

            'position' => 'integer|min:1',
        ];
    }
}
