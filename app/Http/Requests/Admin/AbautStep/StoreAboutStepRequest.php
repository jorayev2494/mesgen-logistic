<?php

namespace App\Http\Requests\Admin\AbautStep;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutStepRequest extends FormRequest
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
            'char_en' => 'required|string|unique:about_steps,char_en|min:1|max:1',
            'char_ru' => 'required|string|unique:about_steps,char_ru|min:1|max:1',
            'char_tk' => 'required|string|unique:about_steps,char_tk|min:1|max:1',
            'title_en' => 'required|string|unique:about_steps,title_en',
            'title_ru' => 'required|string|unique:about_steps,title_ru',
            'title_tk' => 'required|string|unique:about_steps,title_tk',
            'text_en' => 'required|string|unique:about_steps,text_en',
            'text_ru' => 'required|string|unique:about_steps,text_ru',
            'text_tk' => 'required|string|unique:about_steps,text_tk',
            'position' => 'integer',
            'is_active' => 'boolean'
        ];
    }
}
