<?php

namespace App\Http\Requests\Admin\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCategoryRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guard('api')->check();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title_en' => 'required|string|unique:blog_categories,title_en',
            'title_ru' => 'required|string|unique:blog_categories,title_ru',
            'title_tk' => 'required|string|unique:blog_categories,title_tk',
        ];
    }
}
