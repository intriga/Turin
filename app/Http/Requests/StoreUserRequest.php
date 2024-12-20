<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:100|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/', // Custom regex to validate email format
                'unique:users,email', // Ensure email is unique in users table
            ],
            'password' => 'required|string|min:8|confirmed', // Password must be at least 8 characters and confirmed
            'role' => 'required|in:admin,editor,guest', // Validate role
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'name.regex' => 'The name may only contain letters, numbers, spaces, and dashes.',
            'email.regex' => 'The email may only contain lowercase letters, numbers, and dashes.',
        ];
    }
}
