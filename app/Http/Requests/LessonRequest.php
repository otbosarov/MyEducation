<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:6|max:255',
            'group_id' => 'required|integer|exists:groups,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Darsni mavzusini kiriting",
            'title.string' => "Dars mavzusini matn ko'rinishda kiriting'",
            'title.min' => "Dars mavzusi kamida 3 ta belgidan iborat bo'lishi kerak",
            'title.max' => "Dars mavzusi 255 ta belgidan oshmasligi kerak",

            'description.required' => "Dars haqida ma'lumot kiriting",
            'description.string' => "Dars haqida ma'lumotni matn ko'rinishda kiriting",
            'description.min' => "Dars haqida ma'lumot kamida 6 ta belgidan iborat bo'lsin",
            'description.max' => "Dars haqida ma'lumot 255 ta belgidan oshmasligi kerak",

            'group_id.required' => "Dars qaysi ID li guruhga bo'lib turganini kirting",
            'group_id.integer' => "Guruh ID raqam bo'lishi kerak",
            'group_id.exists' => "Bu ID guruhlar jadvalida mavjud emas",
        ];
    }
}
