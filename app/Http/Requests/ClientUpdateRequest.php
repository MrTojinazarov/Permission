<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;
class ClientUpdateRequest extends FormRequest
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
            'login' => 'required|string|max:255|unique:clients,login,' . $this->client->id,
            'password' => 'nullable|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Iltimos, loginni kiriting.',
            'login.unique' => 'Bu login allaqachon mavjud.',
            'password.confirmed' => 'Parol tasdiqlanmagan.',
        ];
    }
}
