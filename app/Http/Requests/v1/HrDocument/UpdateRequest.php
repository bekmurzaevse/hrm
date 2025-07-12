<?php

namespace App\Http\Requests\v1\HrDocument;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            // 'name' => 'nullable|string',
            // 'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf'
        ];
    }

    /**
     * Summary of messages
     * @return array{description.required: string, file.file: string, file.mimes: string, file.required: string, name.required: string}
     */
    public function messages(): array
    {
        return [
            'file.required' => 'Fayl ma\'jbu\'riy.',
            'file.file' => 'Fayl bolıwı kerek.',
            'file.mimes' => 'Fayl formati pdf bolıwı kerek.',
        ];
    }
}
