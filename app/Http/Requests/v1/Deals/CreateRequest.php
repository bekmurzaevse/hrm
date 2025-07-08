<?php

namespace App\Http\Requests\v1\Deals;

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
            'client_id' => 'required|integer|exists:clients,id',
            'stage' => 'nullable|string|in:lead,negotiation,contract,completed',
            'value' => 'required|integer',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Summary of messages
     * @return array{contact_info.required: string, contact_info.string: string, created_by.required: string, created_by.unique: string, name.required: string, name.string: string, name.unique: string}
     */
    public function messages(): array
    {
        return [
            'client_id.required' => "Klient id kiritiw ma'jbu'riy!",
            'client_id.integer' => "Klient id pu'tin san boliwi kerek!",
            'client_id.exists' => "Bunday klient id bazada tabilmadi!",
            'stage.string' => "stage tekst boliwi kerek!",
            'stage.in' => "Stage g'a (lead,negotiation,contract,completed) lardan basqa teks qabillanbaydi!",
        ];
    }
}
