<?php

namespace App\Http\Requests\v1\Task;

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
     * Get the validation rules that apply to the request.cou
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'assigned_to_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date_format:Y-m-d H:i',
            'status' => 'required|string|in:pending,completed,in_progress,canceled',
            'created_by_id' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Summary of messages
     * @return array{assigned_to_id.exists: string, assigned_to_id.integer: string, assigned_to_id.required: string, created_by_id.exists: string, created_by_id.integer: string, created_by_id.required: string, description.string: string, due_date.date_format: string, due_date.required: string, status.in: string, status.required: string, status.string: string, title.max: string, title.required: string, title.string: string}
     */
    public function messages(): array
    {
        return [
            'assigned_to_id.required' => "assigned_to_id ma'jburiy.",
            'assigned_to_id.integer' => 'assigned_to_id integer boliwi kerek.',
            'assigned_to_id.exists' => 'assigned_to_id bazadan tawilmadi.',
            'title.required' => "title ma'jburiy.",
            'title.string' => 'title string boliwi kerek.',
            'title.max' => 'title 255 belgiden aspawi kerk.',
            'description.string' => 'description string boliwi kerek.',
            'due_date.required' => "due_date ma'jburiy.",
            'due_date.date_format' => 'due_date format Y-m-d H:i boliwi kerek.',
            'status.required' => "status ma'jburiy.",
            'status.string' => 'status string boliwi kerek.',
            'status.in' => "status boliwi kerek ma'nisler: pending, completed, in_progress, canceled.",
            'created_by_id.required' => "created_by_id ma'jburiy.",
            'created_by_id.integer' => 'created_by_id integer boliwi kerek.',
            'created_by_id.exists' => 'created_by_id bazadan tawilmadi.',
        ];
    }
}
