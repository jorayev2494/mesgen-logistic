<?php

namespace App\Http\Requests\Admin\Partner;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
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
            'title_en' => 'string|min:2|max:25',
            'title_ru' => 'string|min:2|max:25',
            'title_tk' => 'string|min:2|max:25',
            'media' => 'required|file|mimes:jpg,jpeg,png,gif',
            'link' => "string|url|unique:partners,link,{$this->route('partner')},id",
        ];
    }
}
