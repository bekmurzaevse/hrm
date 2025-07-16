<?php

namespace App\Http\Requests\v1\Finance;

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
            'type' => 'required|string|max:255',
            'client_id' => 'required|integer|exists:clients,id',
            'vacancy_id' => 'required|integer|exists:vacancies,id',
            'amount' => 'required|numeric|between:0,9999999999.99',
            'category' => 'required|string|max:255',
            'note' => 'required|string|max:6000',
            'date' => 'required|date_format:Y-m-d',
        ];
    }

    /**
     * Summary of messages
     * @return array{amount.required: string, amount.string: string, category.max: string, category.required: string, category.string: string, client_id.exists: string, client_id.integer: string, client_id.required: string, date.date_format: string, date.required: string, note.max: string, note.required: string, note.string: string, type.max: string, type.required: string, type.string: string, vacancy_id.exists: string, vacancy_id.integer: string, vacancy_id.required: string}
     */
    public function messages(): array
    {
        return [
            'type.required' => "type ma'jburiy.",
            'type.string' => 'type string boliwi kerek.',
            'type.max' => 'type 255 belgiden aspawi kerk.',
            'client_id.required' => "client_id ma'jburiy.",
            'client_id.integer' => 'client_id integer boliwi kerek.',
            'client_id.exists' => 'client_id bazadan tawilmadi.',
            'vacancy_id.required' => "vacancy_id ma'jburiy.",
            'vacancy_id.integer' => 'vacancy_id integer boliwi kerek.',
            'vacancy_id.exists' => 'vacancy_id bazadan tawilmadi.',
            'amount.required' => "amount ma'jburiy.",
            'amount.string' => 'amount numeric 12 xanali san boliwi kerek.',
            'category.required' => "category ma'jburiy.",
            'category.string' => 'category string boliwi kerek.',
            'category.max' => 'category 255 belgiden aspawi kerk.',
            'note.required' => "note ma'jburiy.",
            'note.string' => 'note string boliwi kerek.',
            'note.max' => 'note 6000 belgiden aspawi kerk.',
            'date.required' => "date ma'jburiy.",
            'date.date_format' => 'date format Y-m-d H:i boliwi kerek.',
        ];
    }
}
