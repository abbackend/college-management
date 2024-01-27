<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'marks' => 'required|array|min:1',
            'marks.*.subject' => 'required|exists:subjects,id',
            'marks.*.theory_marks' => 'required|integer',
            'marks.*.practical_marks' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'marks.*.theory_marks.required' => 'This field is required.',
            'marks.*.practical_marks.required' => 'This field is required.',
            'marks.*.theory_marks.integer' => 'This field must be an integer.',
            'marks.*.practical_marks.integer' => 'This field must be an integer.'
        ];
    }
}
