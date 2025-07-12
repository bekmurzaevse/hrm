<?php

namespace App\Http\Requests\v1\TestResult;

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
            'test_id' => 'required|integer|exists:tests,id',
            'user_id' => 'required|integer|exists:users,id',
            'score' => 'required|numeric|min:0|max:100',
            'taken_at' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'test_id.required' => "Test ID ma'jbu'riy.",
            'user_id.required' => "User ID m'ajbu'riy.",
            'score.required' => "Score ma'jbu'riy.",
            'taken_at.required' => "Test tapsirilg'an waqit ma'jbu'riy.",
            'test_id.exists' => "Bul test ID sistemada joq.",
            'user_id.exists' => "Bul user ID sistemada joq.",
            'score.numeric' => "Score san boluwi kerek.",
            'score.min' => "Score 0 den kishi bolmawi kerek.",
            'score.max' => "Score 100 den u'lken bolmawi kerek.",
        ];
    }
}