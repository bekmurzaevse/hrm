<?php

namespace App\Http\Requests\v1\Tag;

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
            'name' => 'required|string',
        ];
    }

    /**
     * Summary of messages
     * @return array{name.required: string, name.string: string}
     */
    public function messages(): array
    {
        return [
            'name.required' => "name ma'jbu'riy!",
            'name.string' => "name tekst boliwi kerek!",
        ];
    }
}
