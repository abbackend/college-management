<?php

namespace App\Http\Requests;

use App\Constants\SubjectType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
            'code' => 'required|string|unique:subjects,code',
            'theory_marks' => 'required|integer',
            'practical_marks' => 'required|integer',
            'type' => Rule::enum(SubjectType::class)
        ];

        if ($this->isMethod('PUT') && $subject = $this->route('subject')) {
            $rules['code'] .= ", {$subject->id}";
        }

        return $rules;
    }
}
