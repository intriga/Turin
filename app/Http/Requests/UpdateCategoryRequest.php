<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $categoryId = $this->route('id'); // Get the category ID from the route

        return [
            'title' => 'required|string|max:100|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'slug' => 'required|string|max:100|regex:/^[\p{L}\p{N}\s\-]+$/u|unique:categories,slug,' . $categoryId, // Ensure slug is unique except for the current category
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'slug.required' => 'The slug is required.',
            'slug.unique' => 'The slug must be unique.',
            'title.regex' => 'The title may only contain letters, numbers, spaces, and dashes.',
        ];
    }
}
