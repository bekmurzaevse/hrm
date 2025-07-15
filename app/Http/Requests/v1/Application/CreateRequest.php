<?php

namespace App\Http\Requests\v1\Application;

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
            'candidate_id' => 'required|integer|exists:candidates,id',
            'vacancy_id' => 'required|integer|exists:vacancies,id',
            'current_stage' => 'required|integer|exists:recruitment_funnel_stages,id',
            'applied_at' => 'required|date',
        ];
    }

    /**
     * Summary of messages
     * @return array{applied_at.date: string, applied_at.required: string, candidate_id.exists: string, candidate_id.integer: string, candidate_id.required: string, current_stage.exists: string, current_stage.integer: string, current_stage.required: string, vacancy_id.exists: string, vacancy_id.integer: string, vacancy_id.required: string}
     */
    public function messages(): array
    {
        return [
            'candidate_id.required' => "Candidate ID ma'jburiy.",
            'candidate_id.integer' => "Candidate ID integer boliwi kerek.",
            'candidate_id.exists' => 'Candidate ID bazadan tablimadi.',
            'vacancy_id.required' => "Vacancy ID ma'jburiy.",
            'vacancy_id.integer' => 'Vacancy ID integer boliwi kerek.',
            'vacancy_id.exists' => 'Vacancy ID bazadan tabilmadi.',
            'current_stage.required' => "Current stage ma'jburiy.",
            'current_stage.integer' => 'Current stage integer boliwi kerek.',
            'current_stage.exists' => 'Current stage bazadan tabilmadi.',
            'applied_at.required' => "Applied at ma'jburiy.",
            'applied_at.date' => 'Applied at date format boliw kerek.',
        ];
    }
}
