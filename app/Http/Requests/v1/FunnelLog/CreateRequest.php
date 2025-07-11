<?php

namespace App\Http\Requests\v1\FunnelLog;

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
            'application_id' => 'required|integer|exists:applications,id',
            'stage_id' => 'required|integer|exists:recruitment_funnel_stages,id',
            'moved_by' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Summary of messages
     * @return array{contact_info.required: string, contact_info.string: string, created_by.required: string, created_by.unique: string, name.required: string, name.string: string, name.unique: string}
     */
    public function messages(): array
    {
        return [
            'application_id.required' => "Application ID ma'jburiy.",
            'application_id.integer' => "Application ID integer boliwi kerek.",
            'application_id.exists' => 'Application ID bazadan tablimadi.',
            'stage_id.required' => "Stage ID  ma'jburiy.",
            'stage_id.integer' => 'Stage ID integer boliwi kerek.',
            'stage_id.exists' => 'Stage ID bazadan tabilmadi.',
            'moved_by.required' => "Moved by  ma'jburiy.",
            'moved_by.integer' => 'Moved by integer boliwi kerek.',
            'moved_by.exists' => 'Moved by bazadan tabilmadi.',
        ];
    }
}
