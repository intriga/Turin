<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('id'); // Get the user ID from the route

        return [
            'name' => 'required|string|max:255|regex:/^[\p{L}\p{N}\s\-]+$/u',
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/', // Custom regex to validate email format
                'unique:users,email,' . $userId, // Allow unique email except for the current user
            ],
            'password' => 'nullable|string|min:8|confirmed', // Password is optional but must be at least 8 characters if provided
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
