<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'name' => ['required','string','max:255'],
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'Company ID is required.',
            'company_id.exists' => 'The selected company does not exist.',
            'name.required' => 'Name is required.',
            'img.image' => 'The file must be an image.',
            'img.mimes' => 'The image must be a type of: jpeg, png, jpg, gif.',
            'img.max' => 'The image may not be greater than 2048 kilobytes.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be at least 0.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be an integer.',
            'quantity.min' => 'Quantity must be at least 0.'
        ];
    }

}
