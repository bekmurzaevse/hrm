<?php

namespace App\Http\Requests\v1\CandidateNote;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'candidate_id' => 'required|integer|exists:candidates,id',
            'user_id'      => 'required|integer|exists:users,id',
            'note'         => 'required|string|max:1000',
        ];
    }
}