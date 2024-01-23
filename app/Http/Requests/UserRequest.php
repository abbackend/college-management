<?php

namespace App\Http\Requests;

use App\Constants\Gender;
use App\Constants\UserCategory;
use App\Rules\UniqueEmail;
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
            'email' => [
                'required',
                'email',
                new UniqueEmail()
            ],
            'password' => 'required|string|min:6',
            'enroll_number' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'gender' => Rule::enum(Gender::class),
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'category' => Rule::enum(UserCategory::class),
            'address' => 'required|string',
            'contact_number' => 'required|string|digits:10',
            'profile_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000'
        ];

        if ($this->method('PUT') && $user = $this->route('user')) {
            array_pop($rules['email']);
            $rules['email'] = [
                'required',
                'email',
                new UniqueEmail($user->id)
            ];
            $rules['password'] = 'nullable|string|min:6';
        }

        return $rules;
    }
}
