<?php

namespace App\Http\Requests\v1\TestResult;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'test_id' => 'nullable|integer|exists:tests,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'score' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages()
    {
        return [
            'test_id.integer' => "Test ID san boliwi kerek.",
            'test_id.exists' => "Bul test ID sistemada joq.",
            'user_id.integer' => "User ID san boliwi kerek.",
            'user_id.exists' => "Bul user ID sistemada joq.",
            'score.required' => "Score ma'jbu'riy.",
            'score.numeric' => "Score san boliwi kerek.",
            'score.min' => "Score 0 den kishi bolmawi kerek.",
            'score.max' => "Score 100 den u'lken bolmawi kerek.",
        ];
    }
}