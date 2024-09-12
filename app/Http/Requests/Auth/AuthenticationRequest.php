<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticationRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:clients,email|max:255',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:20',
            'blood_type_id' => 'nullable|integer|exists:blood_types,id',
            'date_of_birth' => 'nullable|date',
            'last_donation_date' => 'nullable|date',
            'city_id' => 'nullable|integer|exists:cities,id',
            'pin_code' => 'nullable|string|max:10',
        ];
    }
}
