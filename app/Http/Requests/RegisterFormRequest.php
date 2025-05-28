<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required|email|unique:customer,email',
            'password' => 'required|confirmed|min:8',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.unique' => 'The email address already exists!.',
            // Add more custom messages as needed
        ];
    }
}
