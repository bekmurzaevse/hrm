<?php

namespace App\Http\Requests\v1\Report;

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
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'generated_by' => 'required|integer',
            'file' => 'required|file|mimes:pdf,doc,docx,excel|max:5120',
            'description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Summary of messages
     * @return array{description.max: string, description.required: string, description.string: string, file.file: string, file.max: string, file.mimes: string, file.required: string, generated_by.integer: string, generated_by.required: string, title.required: string, title.string: string, type.integer: string, type.required: string}
     */
    public function messages(): array
    {
        return [
            'title.required' => "title ma'jburiy",
            'title.string' => "title string boliwi kerak",
            'type.required' => "type ma'jburiy",
            'type.integer' => "type string boliwi kerak",
            'generated_by.required' => "generated_by ma'jburiy",
            'generated_by.integer' => "generated_by integer boliwi kerak",
            'file.required' => "file ma'jburiy",
            'file.file' => "file boliwi kerak",
            'file.mimes' => "file tek pdf, doc, docx, excel formatlarda boliwi kerak",
            'file.max' => "file ko'lemi 5MB dan aspawi kerak",
            'description.required' => "description ma'jburiy",
            'description.string' => "description string boliwi kerak",
            'description.max' => "description ko'lemi 1000 belgidan aspawi kerak",
        ];
    }
}
