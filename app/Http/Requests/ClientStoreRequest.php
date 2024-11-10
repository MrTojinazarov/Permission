<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'login' => 'required|unique:clients,login',
            'password' => 'required'
        ];
    }

    
    public function messages()
    {
        return [
            'login.required' => "Loginni to'ldiring",
            'login.unique' => "Bu login avval kiritilgan",
            'password.required' => "Passwordni to'ldiring",
        ];
    }
}
