<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:100|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'slug' => 'required|string|max:100|unique:categories,slug|regex:/^[\p{L}\p{N}\s\-]+$/u', // Ensure slug is unique in categories table
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'slug.required' => 'The slug is required.',
            'slug.unique' => 'The slug must be unique.',
            'title.regex' => 'The title may only contain letters, numbers, spaces, and dashes.',
            'slug.regex' => 'The slug may only contain lowercase letters, numbers, and dashes.',
        ];
    }
}
