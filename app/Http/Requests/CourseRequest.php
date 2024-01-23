<?php

namespace App\Http\Requests;

use App\Constants\CourseType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string',
            'code' => 'required|string|unique:courses,code',
            'duration' => 'required|integer',
            'duration_type' => Rule::enum(CourseType::class)
        ];

        if ($this->isMethod('PUT') && $course = $this->route('course')) {
            $rules['code'] .= ", {$course->id}";
        }

        return $rules;
    }
}
