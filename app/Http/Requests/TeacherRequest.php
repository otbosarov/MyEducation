<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'teacher_name' => "required|string|min:3|max:255|regex:/^[A-Za-z\'\s]+$/",
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string|starts_with:+998|size:17|unique:teachers,phone',

        ];
    }
    public function messages()
    {
        return [
            'teacher_name.required' => "O'qituvchini ismini kiriting",
            'teacher_name.string' => "O'qituvchi ismini matn ko'rinishda kirting",
            'teacher_name.min' => "O'qituvchi ismi kamida 3 ta belgidan iborat bo'lishi kerak",
            'teacher_name.max' => "O'qituvchi  ismi 255 ta belgidan oshmasligi kerak ",
            'teacher_name.regex' => "O'qituvchi ismi faqat lotin harflardan iborat bo'lishi kerak",

            'gender.required' => "O'qituvchini jinsini kiriting",
            'gender.string' => "O'qituvchi jinsini matn ko'rinishda kiriting",
            'gender.in' => "O'qituvchi jinsini to'g'risini tanlang",

            'phone.required' => 'Telefon raqamini kiritish majburiy!',
            'phone.starts_with' => 'Telefon raqami +998 bilan boshlanishi kerak.',
            'phone.size' => 'Telefon raqami uzunligi 17 ta belgidan iborat bo\'lishi kerak.',
            'phone.unique' => 'Bu raqam allaqachon mavjud.',

        ];
    }
}
