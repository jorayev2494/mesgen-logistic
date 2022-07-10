<?php

namespace App\Http\Requests\Admin\Country\Address;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge($this->route()->parameters);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'country' => 'required|integer|exists:countries,id',
            'address_en' => 'string',
            'address_ru' => 'string',
            'address_tk' => 'string',
            'position' => 'integer|min:1',
            'is_active' => 'boolean',
        ];
    }
}
