<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'breed' => 'string|min:3|max:250',
            'gender' => 'string|min:3|max:250',
            'injured' => 'boolean',
            'age' => 'integer|min:1|max:6000',
            'weight' => 'integer|min:1|max:6000',
            'featured_image' => 'image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
