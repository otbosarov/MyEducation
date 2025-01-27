<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'student_name' => "required|string|min:3|max:255",  //|regex:/^[A-Za-z\'\s]+$/
            'phone' => 'required|string|starts_with:+998|size:17|unique:students,phone',
            'rating' => 'nullable|integer|between:1,100'

        ];
    }
    public function messages()
    {
        return [
            'student_name.required' => "O'quvchi ismini kiritish majburiy",
            'student_name.string' => "O'quvchi ismini matn ko'rinishda kirting",
            'student_name.min' => "O'quvchi ismi kamida 3 ta belgidan iborat bo'lishi kerak",
            'student_name.max' => "O'quvchi ismi 255 ta belgidan oshmasligi kerak ",
           // 'student_name.regex' => "O'quvchi ismi faqat lotin harflardan iborat bo'lishi kerak",

            'phone.required' => 'Telefon raqamini kiritish majburiy!',
            'phone.starts_with' => 'Telefon raqami +998 bilan boshlanishi kerak.',
            'phone.size' => 'Telefon raqami uzunligi 17 ta belgidan iborat bo\'lishi kerak.',
            'phone.unique' => 'Bu raqamli o\'quvchi avval ro\'yhatdan o\'tgan',

            'rating.integer' => "Reyting butun son ko'rinishda bo'lsin",
            'rating.between' => "Reyting 1 dan 100 gacha sonlarni qabul qiladi"
        ];
    }
}
