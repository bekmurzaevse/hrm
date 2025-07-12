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
            'course_id' => 'required|exists:courses,id',
            'file_url' => 'required|url|max:255',
            'type' => 'required|string|in:pdf,video,image,document',
            'uploaded_at' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => "Kurs ID ma'jbu'riy!",
            'course_id.exists' => "Bunday kurs ID bazada tabilmadi!",
            'file_url.required' => "Fayl URL ma'jbu'riy!",
            'file_url.url' => "Fayl URL duris formatta boliw kerek!",
            'file_url.max' => "Fayl URL 255 belgiden ko'p bolmawi kerek!",
            'type.required' => "Fayl tu'ri ma'jbu'riy!",
            'type.string' => "Fayl tu'ri tekst boliw kerek!",
            'type.in' => "Fayl tu'ri tek pdf, video, image, document boliwi mu'mkin.",
            'uploaded_at.required' => "Ju'klengen waqti ma'jbu'riy!",
            'uploaded_at.date' => "Ju'klengen waqti duris sa'ne formatta boliw kerek!",
        ];
    }
}