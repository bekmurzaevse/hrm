<?php

namespace App\Http\Requests\v1\CourseMaterial;

use Illuminate\Foundation\Http\FormRequest;

class DownloadRequest extends FormRequest
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
            'course_id' => 'required|integer|exists:courses,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'course_id.required' => "Kurs ID ma'jbu'riy!",
            'course_id.integer'  => "Kurs ID pu'tin san boliw kerek!",
            'course_id.exists'   => "Bunday kurs ID bazada tabilmadi!",
        ];
    }
}