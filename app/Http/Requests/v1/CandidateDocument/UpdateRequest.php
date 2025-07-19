<?php

namespace App\Http\Requests\v1\CandidateDocument;

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
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'candidate_id' => 'required|integer|exists:candidates,id',
            'file' => 'required|file|mimes:pdf'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'file.required'         => 'Fayl ma\'jbu\'riy.',
            'file.file'             => 'Fayl bolıwı kerek.',
            'file.mimes'            => 'Fayl formati pdf bolıwı kerek.',
            'candidate_id.required' => "Candidate ID kiritiw ma'jbu'riy!",
            'candidate_id.integer'  => "Candidate ID pu'tin san boliwi kerek!",
            'candidate_id.exists'   => "Bunday candidate ID bazada tabilmadi!",
        ];
    }
}