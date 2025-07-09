<?php

namespace App\Http\Requests\v1\Project;

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
            'title' => 'required|string',
            'status' => 'nullable|string|in:active,completed,paused',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|string',
            'created_by' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Summary of messages
     * @return array{created_by.exists: string, created_by.required: string, status.in: string, status.string: string, title.required: string, title.string: string}
     */
    public function messages(): array
    {
        return [
            'title.required' => "title ma'jbu'riy!",
            'title.string' => "title tekst boliwi kerek!",
            'status.in' => "status ma'nisi (active,completed,paused) lerden basqa bolmawai kereke!",
            'status.string' => "title tekst boliwi kerek!",
            'created_by.required' => "CreatedBy ma'jbu'riy!",
            'created_by.exists' => "Bunday user id bazada tabilmadi!",
        ];
    }
}
