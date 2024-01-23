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
        return [
            'name' => 'required|string',
            'code' => 'required|string',
            'duration' => 'required|integer',
            'duration_type' => Rule::enum(CourseType::class)
        ];
    }
}
