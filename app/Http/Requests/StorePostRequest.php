<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|string|max:100|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'slug' => 'required|string|max:100|unique:posts,slug|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'category' => 'required|exists:categories,id', // Assuming you have a categories table
            'content' => 'nullable|string', // Make content nullable if it's optional
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'slug.required' => 'The slug is required.',
            'slug.unique' => 'The slug must be unique.',
            'category.required' => 'The category is required.',
            'content.string' => 'The content must be a string.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'title.regex' => 'The title may only contain letters, numbers, spaces, and dashes.',
        ];
    }
}
