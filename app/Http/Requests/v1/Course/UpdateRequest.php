<?php

namespace App\Http\Requests\v1\Course;

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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|integer|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => "Title ma'jburiy!",
            'title.string' => "Title string boliw kerek!",
            'title.max' => "Title 255 so'zden kop bolmawi kerek!",
            'created_by.required' => "CreatedBy ma'jbu'riy!",
            'created_by.exists' => "Bunday user id bazada tabilmadi!",
        ];
    }
}