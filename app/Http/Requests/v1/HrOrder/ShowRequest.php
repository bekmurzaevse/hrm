<?php

namespace App\Http\Requests\v1\HrOrder;

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
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Summary of messages
     * @return array{user_id.exists: string, user_id.integer: string, user_id.required: string}
     */
    public function messages(): array
    {
        return [
            'user_id.required' => "User id kiritiw ma'jbu'riy!",
            'user_id.integer' => "User id pu'tin san boliwi kerek!",
            'user_id.exists' => "Bunday user id bazada tabilmadi!",
        ];
    }
}
