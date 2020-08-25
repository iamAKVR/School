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
            'id' => 'required|regex:/^[\pL\s\-]+$/u',
            'username' => 'required',
            'phone' => 'required|min:10|unique:users,id,'.request()->id.',id,deleted_at,NULL',
            'password' => 'nullable|min:6',
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
