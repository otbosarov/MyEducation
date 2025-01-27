<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
            'lesson_id' => 'required|integer|exists:lessons,id',
            'score' => 'required|integer|between:0,5',
            'student_id' => 'required|integer|exists:students,id'
        ];
    }
    public function messages()
    {
        return [
            'lesson_id.required' => "Dars ID kiriting",
            'lesson_id.integer' => "Dars ID butun son bo'lishi kerak",
            'lesson_id.exists' => "Bu ID darslar jadvalida mavjud emas",

            'score.required' => "Ball kiriting",
            'score.integer' => "Ball ni raqam ko'rinishda kiriting",
            'score.between' => "Ball 0 dan 5 gacha sonlarini qabul qiladi",

            'student_id.required' => "O'quvchi ID ni kiriting",
            'student_id.integer' => "O'quvchi ID ni raqam ko'rinishda kiriting",
            'student_id.exists' => "Bu ID o'quvchilar jadvalida mavjud emas"
        ];
    }
}
