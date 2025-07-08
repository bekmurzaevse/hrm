<?php

namespace App\Http\Requests\v1\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Summary of messages
     * @return array{email.email: string, email.required: string, email.unique: string, first_name.required: string, first_name.string: string, last_name.required: string, last_name.string: string, password.min: string, password.required: string, phone.required: string, phone.string: string, phone.unique: string}
     */
    public function messages(): array
    {
        return [
            'first_name.required' => "Ati ma'jbu'riy!",
            'first_name.string' => "Ati tekst boliwi kerek!",
            'last_name.required' => "Familiya ma'jbu'riy!",
            'last_name.string' => "Familiya tekst boliwi kerek!",

            'email.required' => "Email ma'jbu'riy!",
            'email.email' => "Email pochta tipinde boliwi kerek!",
            'email.unique' => "Bunday email bazada bar!",

            'phone.required' => "phone ma'jbu'riy!",
            'phone.string' => "Phone tekst tipinde boliwi kerek!",
            'phone.unique' => "Bunday phone bazada bar!",

            'password.required' => "Parol ma'jbu'riy!",
            'password.min' => "Parol keminde 6 xanali boliwi kerek!",
        ];
    }
}
