<?php

namespace App\Http\Requests\Admin\Country\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
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
            'country_id' => 'required|integer|exists:countries,id',
            'address_en' => 'required|string',
            'address_ru' => 'required|string',
            'address_tk' => 'required|string',
            'position' => 'integer|min:1',
            'is_active' => 'boolean',
        ];
    }

    /**
     * @param $keys
     * @return array
     */
    public function all($keys = null): array
    {
        return array_merge($this->route()->parameters);
    }
}