<?php

namespace App\Http\Requests\v1\Test;

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
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => "Title ma'jbu'riy.",
            'course_id.required' => "Course ID ma'jbu'riy.",
            'course_id.exists' => "Kurs tabilmadi.",
        ];
    }
}