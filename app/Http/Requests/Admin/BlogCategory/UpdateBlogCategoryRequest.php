<?php

namespace App\Http\Requests\Admin\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guard('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $blogCategoryId = $this->route()->parameter('category');

        return [
            'title_en' => "string|unique:blog_categories,title_en,{$blogCategoryId},id",
            'title_ru' => "string|unique:blog_categories,title_ru,{$blogCategoryId},id",
            'title_tk' => "string|unique:blog_categories,title_tk,{$blogCategoryId},id",
        ];
    }
}
