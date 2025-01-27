<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupToStudentRequest extends FormRequest
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
            'group_id' => 'required|integer|exists:groups,id',
            //'student_id' => 'required|integer|exists:students,id'
            'student_id' => ['required', 'exists:students,id', Rule::unique('group_to_students')->where(function ($query) {
                $query->where('group_id', $this->group_id)
                    ->where('student_id', $this->student_id);
            })]
        ];
    }
    public function messages()
    {
        return [
            'group_id.required' => "Guruh ID kiriting",
            'group_id.integer' => "Guruh ID raqam bo'lishi kerak",
            'group_id.exists' => "Bu ID guruhlar jadvalida mavjud emas",

            'student_id.required' => "O'quvchi ID kiriting ",
            'student_id.integer' => "O'quvchi ID raqam bo'lishi kerak",
            'student_id.exists' => "Bu ID o'quvchilar jadvalida mavjud emas",
            'student_id.unique' => "Bu o'quvchi avval guruhga kiritilgan"
        ];
    }
}
