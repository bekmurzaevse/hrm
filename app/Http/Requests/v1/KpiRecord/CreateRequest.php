<?php

namespace App\Http\Requests\v1\KpiRecord;

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
            'user_id' => 'required|integer|exists:users,id',
            'vacancy_id' => 'required|integer|exists:vacancies,id',
            'kpi_score' => 'required|numeric|between:0,999.99',
            'calculated_at' => 'required|date_format:Y-m-d H:i',
        ];
    }

    /**
     * Summary of messages
     * @return array{calculated_at.date_format: string, calculated_at.required: string, kpi_score.float: string, kpi_score.required: string, user_id.exists: string, user_id.integer: string, user_id.required: string, vacancy_id.exists: string, vacancy_id.integer: string, vacancy_id.required: string}
     */
    public function messages(): array
    {
        return [
            'user_id.required' => "user_id ma'jburiy.",
            'user_id.integer' => 'user_id integer boliwi kerek.',
            'user_id.exists' => 'user_id bazadan tawilmadi.',
            'vacancy_id.required' => "vacancy_id ma'jburiy.",
            'vacancy_id.integer' => 'vacancy_id integer boliwi kerek.',
            'vacancy_id.exists' => 'vacancy_id bazadan tawilmadi.',
            'kpi_score.required' => "kpi_score ma'jburiy.",
            'kpi_score.float' => 'kpi_score numeric 0 menen 999.99 arasinda boliwi kerek.',
            'calculated_at.required' => "calculated_at ma'jburiy.",
            'calculated_at.date_format' => 'calculated_at format Y-m-d H:i boliwi kerek.',
        ];
    }
}
