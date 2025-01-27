<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'group_name' => 'required|string|min:3|max:255|unique:groups,group_name',
            'subject_id' => 'required|integer|exists:subjects,id',
            'teacher_id' => 'required|integer|exists:teachers,id'
        ];
    }
    public function messages()
    {
        return [
            'group_name.required' => "Guruh nomini kiriting",
            'group_name.string' => "Guruh nomini matn ko'rinishda kiritng",
            'group_name.min' => "Guruh nomi kamida 3 ta belgidan iborat bo'lsin",
            'group_name.max' => "Guruh nomi 255 ta belgidan oshmasligi kerak",
            'group_name.unique' => "Bu guruh avval yaratilgan",

            'subject_id.required' => 'Fan ID  kiriting',
            'subject_id.integer' => "Fan ID butun son bo'lishi kerak",
            'subject_id.exists' => "Bu ID fanlar jadvalida mavjud emas",

            'teacher_id.required' => "O'qituvchi ID kiriting",
            'teacher_id.integer' => "O'qituvchi ID raqam bo'lishi kerak",
            'teacher_id.exists' => "Bu ID o'qituvchilar jadvalida mavjud emas "
        ];
    }
}
