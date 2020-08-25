<?php

namespace App\Http\Requests\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->id != request()->id){
            return false;
        }
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
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email'  =>  'required|min:10|max:30|email|unique:users,id,'.request()->id.',id,deleted_at,NULL',
            'phone' => 'required|min:10|unique:users,id,'.request()->id.',id,deleted_at,NULL',
            'password' => 'nullable|min:6',
            'profile_image' => 'nullable|mimes:jpg,jpeg,png', //Remove space from 'picture'
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
        ];
    }
}
