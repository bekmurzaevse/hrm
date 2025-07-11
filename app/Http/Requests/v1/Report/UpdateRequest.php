<?php

namespace App\Http\Requests\v1\Report;

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
     * Get the validation rules that apply to the request.cou
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'type' => 'sometimes|string|max:255',
            'generated_by' => 'sometimes|integer',
            'file' => 'sometimes|file|mimes:pdf,doc,docx,excel|max:5120',
        ];
    }

    /**
     * Summary of messages
     * @return array{file.file: string, file.max: string, file.mimes: string, generated_by.integer: string, title.string: string, type.integer: string}
     */
    public function messages(): array
    {
        return [
            'title.string' => "title string boliwi kerak",
            'type.integer' => "type string boliwi kerak",
            'generated_by.integer' => "generated_by integer boliwi kerak",
            'file.file' => "file boliwi kerak",
            'file.mimes' => "file tek pdf, doc, docx, excel formatlarda boliwi kerak",
            'file.max' => "file ko'lemi 5MB dan aspawi kerak",
        ];
    }
}
