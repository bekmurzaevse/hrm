<?php

namespace App\Http\Requests\v1\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $candidateId = $this->route('id');
        return [
            'first_name'   => 'sometimes|required|string|max:255',
            'last_name'    => 'sometimes|required|string|max:255',
            'email'        => "sometimes|required|email|unique:candidates,email,{$candidateId}",
            'phone'        => 'nullable|string|max:20',
            'education'    => 'nullable|string',
            'experience'   => 'nullable|string',
            'photo'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status'       => 'sometimes|required|string|max:50',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => "First name ma'jbu'riy.",
            'first_name.string'   => "First name string boliw kerek.",
            'first_name.max'      => "First name 255 belgiden ko'p bolmawi kerek.",

            'last_name.required'  => "Last name ma'jbu'riy.",
            'last_name.string'    => "Last name string boliw kerek.",
            'last_name.max'       => "Last name 255 belgiden ko'p bolmawi kerek.",

            'email.required'      => "Email ma'jbu'riy.",
            'email.email'         => "Email haqiyqiy email adress boliw kerek.",
            'email.unique'        => "Bul email aldin registiraciyadan o'tken.",

            'phone.string'        => "Phone string boliw kerek.",
            'phone.max'           => "Phone 20 belgiden ko'p bolmawi kerek.",

            'education.string'    => "Education string boliw kerek.",
            'experience.string'   => "Experience string boliw kerek.",
            
            'photo.required'      => "Photo ma'jbu'riy.",
            'photo.image'         => "Photo boliw kerek.",
            'photo.mimes'         => "Photo jpeg, png, jpg formatlarinda boliw kerek.",
            'status.required'     => "Status ma'jbu'riy.",
            'status.string'       => "Status string boliw kerek.",
            'status.max'          => "Status 50 belgiden ko'p bolmawi kerek.",
        ];
    }
}