<?php

namespace App\Http\Requests\v1\CourseMaterial;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'course_id' => 'required|integer|exists:courses,id',
            'file' => 'required|file|mimes:pdf'
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => "Kurs ID ma'jbu'riy!",
            'course_id.integer'  => "Kurs ID pu'tin san boliw kerek!",
            'course_id.exists'   => "Bunday kurs ID bazada tabilmadi!",
            'file.required'      => 'Fayl ma\'jbu\'riy.',
            'file.file'          => 'Fayl bolıwı kerek.',
            'file.mimes'         => 'Fayl formati pdf bolıwı kerek.',
        ];
    }
}