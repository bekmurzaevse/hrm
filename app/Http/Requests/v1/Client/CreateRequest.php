<?php

namespace App\Http\Requests\v1\Client;

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
            'name' => 'required|string|unique:clients,name',
            'contact_info' => 'required|string',
            'status' => 'nullable|string',
            'created_by' => 'required|exists:users,id',
            'tags' => 'nullable|array',
            'tags.*' => 'required|integer|exists:tags,id',
        ];
    }

    /**
     * Summary of messages
     * @return array{contact_info.required: string, contact_info.string: string, created_by.required: string, created_by.unique: string, name.required: string, name.string: string, name.unique: string}
     */
    public function messages(): array
    {
        return [
            'name.required' => "Klient ati ma'jbu'riy!",
            'name.string' => "Klient ati tekst boliwi kerek!",
            'name.unique' => "Bunday klient ati bazada bar!",

            'contact_info.required' => "Kontakt ma'jbu'riy!",
            'contact_info.string' => "Kontakt tekst boliwi kerek!",

            'created_by.required' => "CreatedBy ma'jbu'riy!",
            'created_by.exists' => "Bunday user id bazada tabilmadi!",
        ];
    }
}
