<?php

namespace App\Http\Requests\v1\Vacancy;

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
     * Summary of rules
     * @return array{description: string, eadline: string, project_id: string, recruiter_id: string, requirements: string, salary: string, status: string, title: string}
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|numeric',
            'eadline' => 'nullable|string',
            'recruiter_id' => 'required|integer|exists:users,id',
            'project_id' => 'required|integer|exists:projects,id',
            'status' => 'nullable|string|in:open,closed',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Summary of messages
     * @return array{deadline.string: string, description.string: string, project_id.exists: string, project_id.integer: string, project_id.required: string, recruiter_id.exists: string, recruiter_id.integer: string, recruiter_id.required: string, requirements.required: string, requirements.string: string, salary.numeric: string, status.in: string, status.string: string, title.required: string, title.string: string}
     */
    public function messages(): array
    {
        return [
            'title.required' => "title ma'jbu'riy!",
            'title.string' => "title tekst boliwi kerek!",
            'requirements.required' => "requirements ma'jbu'riy!",
            'requirements.string' => "requirements tekst boliwi kerek!",
            'salary.numeric' => "salary polyag'a tsifr kiritiliwi kerek!",
            'deadline.string' => "deadline tekst boliwi kerek!",
            'recruiter_id.required' => "Recruiter id ma'jbu'riy!",
            'recruiter_id.integer' => "Recruiter id pu'tin tipte kiritiliwi kerek!",
            'recruiter_id.exists' => "Bunday user id bazada tabilmadi!",
            'project_id.required' => "Recruiter id ma'jbu'riy!",
            'project_id.integer' => "Project id id pu'tin tipte kiritiliwi kerek!",
            'project_id.exists' => "Bunday user id bazada tabilmadi!",
            'status.string' => "Status ta tekst kiritiliwi kerek!",
            'status.in' => "Status ta open, closed boliwi kerek!",
            'description.string' => "description g'a tekst kiritiliwi kerek!",
        ];
    }
}
