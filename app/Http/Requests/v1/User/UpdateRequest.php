<?php

namespace App\Http\Requests\v1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $userId = $this->route('user') ?? $this->id; // yoki route param, yoki body dan id

        // TODO Update unique phone and email
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            // 'email' => 'required|email|unique:users,email,' . $this->id,
            // 'phone' => 'required|string|unique:users,phone,' . $this->phone,

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => [
                'required',
                'string',
                Rule::unique('users', 'phone')->ignore($userId),
            ],
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Summary of messages
     * @return array{email.email: string, email.required: string, first_name.required: string, first_name.string: string, last_name.required: string, last_name.string: string, password.min: string, password.required: string, phone.required: string, phone.string: string}
     */
    public function messages(): array
    {
        $userId = $this->route('user') ?? $this->id; // yoki route param, yoki body dan id

        return [
            'first_name.required' => "Ati ma'jbu'riy!",
            'first_name.string' => "Ati tekst boliwi kerek!",
            'last_name.required' => "Familiya ma'jbu'riy!",
            'last_name.string' => "Familiya tekst boliwi kerek!",

            'email.required' => "Email ma'jbu'riy!",
            'email.email' => "Email pochta tipinde boliwi kerek!",

            'phone.required' => "phone ma'jbu'riy!",
            'phone.string' => "Phone tekst tipinde boliwi kerek!",

            'password.required' => "Parol ma'jbu'riy!",
            'password.min' => "Parol keminde 6 xanali boliwi kerek!",
        ];
    }
}
