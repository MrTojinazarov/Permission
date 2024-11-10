<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|mimes:jpg,jpeg,png,webp', // "webp" kengaytmasi o'z o'rnida
        ];
    }
    
    public function messages()
    {
        return [
            'company_id.required' => 'Iltimos, kompaniya tanlang.',
            'company_id.exists' => 'Tanlangan kompaniya mavjud emas.',
            'name.required' => 'Iltimos, mahsulot nomini kiriting.',
            'name.string' => 'Mahsulot nomi matn bo\'lishi kerak.',
            'name.max' => 'Mahsulot nomi maksimal 255 ta belgidan iborat bo\'lishi kerak.',
            'price.required' => 'Iltimos, mahsulot narxini kiriting.',
            'price.numeric' => 'Mahsulot narxi raqam bo\'lishi kerak.',
            'price.min' => 'Mahsulot narxi 0 dan kichik bo\'lmasligi kerak.',
            'quantity.required' => 'Iltimos, mahsulot miqdorini kiriting.',
            'quantity.integer' => 'Mahsulot miqdori butun raqam bo\'lishi kerak.',
            'quantity.min' => 'Mahsulot miqdori 0 dan kichik bo\'lmasligi kerak.',
            'img.mimes' => 'Rasm JPG, JPEG, PNG yoki WEBP formatida bo\'lishi kerak.', // Kengaytmalari ro'yxatini to'g'ri kiritish
        ];
    }
    
    
}
