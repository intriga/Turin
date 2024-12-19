<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $postId = $this->route('id'); // Get the post ID from the route

        return [
            'title' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $postId . '|regex:/^[a-z0-9\-]+$/',
            'category' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'nullable|string|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ];
    }

    public function messages()
    {
        return [
            'title.regex' => 'The title may only contain letters, numbers, spaces, and dashes.',
            'slug.regex' => 'The slug may only contain lowercase letters, numbers, and dashes.',
        ];
    }
}
