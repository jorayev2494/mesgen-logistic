<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
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
            'title' => 'string|min:5|max:25',
            'text' => 'string||min:10|max:50',
            'is_active' => 'boolean',
            'position' => 'integer|min:1'
        ];
    }
}
