<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Social;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialRequest extends FormRequest
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
            'slug' => "string|alpha|unique:socials,slug,{$this->route('social')},id",
            'link' => "string|url|unique:socials,link,{$this->route('social')},id",
            'is_active' => 'boolean',
            'position' => 'integer|min:1'
        ];
    }
}
