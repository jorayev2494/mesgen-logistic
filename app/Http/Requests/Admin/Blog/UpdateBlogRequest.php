<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'media' => 'file|mimes:jpg,jpeg,png,gif|dimensions:width:858|dimensions:height:474',

            'title_en' => 'string|min:5|max:25|unique:blogs,title_en',
            'title_ru' => 'string|min:5|max:25|unique:blogs,title_ru',
            'title_tk' => 'string|min:5|max:25|unique:blogs,title_tk',

            'text_en' => 'string|min:10|max:50',
            'text_ru' => 'string|min:10|max:50',
            'text_tk' => 'string|min:10|max:50',
            'tag_ids' => 'array',
            'tags.*' => 'string|exists:tags,value',

            'user_id' => 'integer|exists:users,id',
            "category_id" => 'integer|exists:blog_categories,id',

            'is_active' => 'boolean',
            'position' => 'integer|min:1'
        ];
    }
}
