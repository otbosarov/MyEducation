<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationUpdateRequest extends FormRequest
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
            'score' => 'required|integer|between:0,5',
        ];
    }
    public function messages()
    {
        return [
            'score.required' => "Ball kiriting",
            'score.integer' => "Ball ni raqam ko'rinishda kiriting",
            'score.between' => "Ball 0 dan 5 gacha sonlarini qabul qiladi",
        ];
    }
}
