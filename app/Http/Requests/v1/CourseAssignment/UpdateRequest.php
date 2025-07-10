<?php

namespace App\Http\Requests\v1\CourseAssignment;

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
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'assigned_at' => 'nullable|date',
            'completed_at' => 'nullable|date|after_or_equal:assigned_at',
            'certificate_url' => 'nullable|string|max:255',
        ];
    }


    /**
     * Summary of messages
     * @return array{course_id.exists: string, course_id.required: string, user_id.exists: string, user_id.required: string, assigned_at.date: string, completed_at.date: string, completed_at.after_or_equal: string, certificate_url.string: string, certificate_url.max: string}
     */
    public function messages(): array
    {
        return [
            'course_id.required' => "Course ID ma'jbu'riy!",
            'course_id.exists' => "Bunday kurs ID bazada tabilmadi!",
            'user_id.required' => "User ID ma'jbu'riy!",
            'user_id.exists' => "Bunday user ID bazada tabilmadi!",
            'assigned_at.date' => "Assigned_at sa'ne boliw kerek!",
            'completed_at.date' => "Completed_at sa'ne boliw kerek!",
            'completed_at.after_or_equal' => "Completed_at assigned_at tan keyin boliw kerek!",
            'certificate_url.string' => "Certificate URL tekst boliw kerek!",
            'certificate_url.max' => "Certificate URL 255 belgiden ko'p bolmawi kerek!",
        ];
    }
}