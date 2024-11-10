<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'client_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'is_active' => 'required|boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'Iltimos, foydalanuvchi ID sini kiriting.',
            'name.required' => 'Iltimos, nomni kiriting.',
            'phone.required' => 'Iltimos, telefon raqamini kiriting.',
            'is_active.required' => 'Iltimos, faol holatni tanlang.',
            'is_active.boolean' => 'Faol holat uchun haqiqat qiymatini kiriting (true/false).',
        ];
    }
    
}
