<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subject_name' => "required|string|min:3|max:100|regex:/^[A-Za-z\'\s]+$/|unique:subjects,subject_name"
        ];
    }
    public function messages()
    {
        return [
            'subject_name.required' => "Fan nomini kiritish majburiy",
            'subject_name.string' => "Fan nomini matn ko'rinishda kiriting",
            'subject_name.min' => "Fan nomi kamida 3 ta belgidan iborat bo'lishi kerak",
            'subject_name.max' => "Fan nomi 100 ta belgidan oshmasligi kerak",
            'subject_name.regex' => "Fan nomi faqat lotin harflaridan iborat bo\'lishi kerak",
            'subject_name.unique' => "Bu fan avval yaratilgan",
        ];
    }
}
