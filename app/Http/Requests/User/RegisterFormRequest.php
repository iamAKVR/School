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
            'username' => 'required|regex:/^[\pL\s\-]+$/u',
            'phone' => 'required|digits:10|unique:users,phone,'.request()->id.',id,deleted_at,NULL',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'phone.required' => 'Phone Number is required',
            'phone.phone' => 'Invalid phone number',
            'password.required' => 'Password is required',
        ];
    }
}
