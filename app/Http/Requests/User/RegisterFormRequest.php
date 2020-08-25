<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.request()->id.',id,deleted_at,NULL',
            'phone' => 'required|min:10|unique:users,phone,'.request()->id.',id,deleted_at,NULL',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
            'profile_image' => 'required|mimes:jpg,jpeg,png', //Remove space from 'picture'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email address',
            'phone_number.required' => 'Phone Number is required',
            'password.required' => 'Password is required',
        ];
    }
}
