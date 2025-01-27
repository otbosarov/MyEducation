<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_name' => "required|string|min:3|max:255|regex:/^[A-Za-z\'\s]+$/",
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string|starts_with:+998|size:17|unique:students,phone',

        ];
    }
    public function messages()
    {
        return [
            'student_name.required' => "O'quvchi ismini kiritish majburiy",
            'student_name.string' => "O'quvchi ismini matn ko'rinishda kirting",
            'student_name.min' => "O'quvchi ismi kamida 3 ta belgidan iborat bo'lishi kerak",
            'student_name.max' => "O'quvchi ismi 255 ta belgidan oshmasligi kerak ",
            'student_name.regex' => "O'quvchi ismi faqat lotin harflardan iborat bo'lishi kerak",

            'gender.required' => "O'quvchini jinsini kiriting",
            'gender.string' => "O'quvchi jinsini matn ko'rinishda kiriting",
            'gender.in' => "O'quvchi jinsini to'g'risini tanlang",

            'phone.required' => 'Telefon raqamini kiritish majburiy!',
            'phone.starts_with' => 'Telefon raqami +998 bilan boshlanishi kerak.',
            'phone.size' => 'Telefon raqami uzunligi 17 ta belgidan iborat bo\'lishi kerak.',
            'phone.unique' => 'Bu raqamli o\'quvchi avval ro\'yhatdan o\'tgan',
        ];
    }
}
