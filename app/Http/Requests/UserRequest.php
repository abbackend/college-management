<?php

namespace App\Http\Requests;

use App\Constants\Gender;
use App\Constants\UserCategory;
use App\Constants\UserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules(): array
    {
        $rules = [
            'course_id' => 'required|exists:courses,id',
            'course_duration' => 'required|integer|gt:0',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'enroll_number' => 'required|string|unique:user_details,enroll_number',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'gender' => ['required', Rule::enum(Gender::class)],
            'date_of_birth' => 'required|date|date_format:Y-m-d|before:today',
            'category' => ['required', Rule::enum(UserCategory::class)],
            'status' => ['required', Rule::enum(UserStatus::class)],
            'address' => 'required|string',
            'contact_number' => 'required|string|digits:10',
            'profile_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000',
            'signature_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000'
        ];

        if ($this->isMethod('PUT') && $user = $this->route('user')) {
            $rules['email'] .= ", {$user->id}";
            $rules['enroll_number'] .= ", {$user->details->id}";
            $rules['password'] = 'nullable|string|min:6';
        }

        return $rules;
    }
}
