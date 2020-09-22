<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:30',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.unique' => 'Email is Already Exist!',
            'name.required' => 'Name is required!',
            // 'name.unique' => 'Name is already exists!',
            'phone.required' => 'Phone is required!',
            'gender.required' => 'Gender is required',
            'password.required' => 'Password is required!'
        ];
    }
}
