<?php

namespace App\Http\Requests\v1\RecruitmentFunnelStage;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    protected $enums = [
        'Application Received',
        'Screening',
        'Interview Scheduled',
        'Interview Completed',
        'Offer Extended',
        'Offer Accepted',
        'Hired',
        'Rejected'
    ];

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
            'vacancy_id' => 'required|integer|exists:vacancies,id',
            'stage_name' => 'required|string|in: ' . implode(',', $this->enums),
            'order' => 'required|integer|min:1',
        ];
    }

    /**
     * Summary of messages
     * @return array{contact_info.required: string, contact_info.string: string, created_by.required: string, created_by.unique: string, name.required: string, name.string: string, name.unique: string}
     */
    public function messages(): array
    {
        return [
            'vacancy_id.required' => "Vacancy ID ma'jbu'riy!.",
            'vacancy_id.integer' => "Vacancy ID int boliwi ma'jbu'riy!.",
            'vacancy_id.exists' => 'Vacancy Id bazada tabilmadi!',
            'stage_name.required' => "Stage name ma'jbu'riy!",
            'stage_name.string' => "Stage name string boliwi ma'jbu'riy!.",
            'stage_name.in' => "Stage name bul enum ma'nislerinen biri boliwi kerek: " . implode(', ', $this->enums),
            'order.required' => "Order ma'jburiy",
            'order.integer' => 'Order integer boliwi kerek',
            'order.min' => "Order ma'nisi 1 u'lken boliwi kerek",
        ];
    }
}
