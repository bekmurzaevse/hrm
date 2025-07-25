<?php

namespace App\Http\Requests\v1\Interaction;

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
            'type' => 'required|string|in:phone,telegram,instagram,email',
            'notes' => 'required|string',
            'description' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    /**
     * Summary of messages
     * @return array{contact_info.required: string, contact_info.string: string, created_by.required: string, created_by.unique: string, name.required: string, name.string: string, name.unique: string}
     */
    public function messages(): array
    {
        return [
            'type.required' => "Type ma'jbu'riy!",
            'type.string' => "Type tekst boliwi kerek!",
            'type.in' => "Type (phone,telegram,instagram,email) usilardan biri boliwi kerek!",
            'notes.required' => "Notes ma'jbu'riy!",
            'notes.string' => "Notes tekst boliwi kerek!",
            'client_id.required' => "Klient ma'jbu'riy!",
            'client_id.exists' => "Bunday klient id bazada tabilmadi!",
            'user_id.required' => "User ma'jbu'riy!",
            'user_id.exists' => "Bunday user id bazada tabilmadi!",
        ];
    }
}
