<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogByRequest extends FormRequest
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
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge($this->query->all());
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'hastag' => 'string|exists:tags,value',
            'user_id' => 'integer|exists:users,id'
        ];
    }
}
