<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest
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
            'subject_id' => 'required|integer|exists:subjects,id',
            'teacher_id' => 'required|integer|exists:teachers,id'
        ];
    }
    public function messages()
    {
        return [
            'subject_id.required' => 'Fan ID  kiriting',
            'subject_id.integer' => "Fan ID butun son bo'lishi kerak",
            'subject_id.exists' => "Bu ID fanlar jadvalida mavjud emas",

            'teacher_id.required' => "O'qituvchi ID kiriting",
            'teacher_id.integer' => "O'qituvchi ID raqam bo'lishi kerak",
            'teacher_id.exists' => "Bu ID o'qituvchilar jadvalida mavjud emas "
        ];
    }
}
