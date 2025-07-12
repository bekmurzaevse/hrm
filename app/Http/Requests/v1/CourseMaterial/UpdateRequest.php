<?php

namespace App\Http\Requests\v1\CourseMaterial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'file_url' => 'nullable|url|max:255',
            'type' => 'nullable|string|in:pdf,video,image,document',
            'uploaded_at' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => "Kurs ID ma'jbu'riy!",
            'course_id.exists' => "Bunday kurs ID bazada tabilmadi!",
            'type.in' => "Fayl tu'ri tek pdf, video, image, document boliwi mu'mkin.",
            'uploaded_at.date' => "Ju'klengen waqti duris formatta boliw kerek!",
        ];
    }
}