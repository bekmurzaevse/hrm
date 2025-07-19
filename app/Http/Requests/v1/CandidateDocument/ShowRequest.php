<?php

namespace App\Http\Requests\v1\CandidateDocument;

use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
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
        ];
    }

    /**
     * Summary of messages
     * @return array{user_id.exists: string, user_id.integer: string, user_id.required: string}
     */
    public function messages(): array
    {
        return [
            'candidate_id.required' => "Candidate ID kiritiw ma'jbu'riy!",
            'candidate_id.integer' => "Candidate ID pu'tin san boliwi kerek!",
            'candidate_id.exists' => "Bunday candidate ID bazada tabilmadi!",
        ];
    }
}