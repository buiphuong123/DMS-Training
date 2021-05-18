<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class UserRequest extends FormRequest
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
            'username' =>  'required|string|max:255|unique:users|alpha',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:3', 'confirmed',
            'avatar'  => 'sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000',
            'description' => 'string', 'max: 255'
        ];
    }

    public function messages() {
        return [
            'username.required' => 'username is also required',
            'username.email' => 'email is also required',
            'password.required' => 'password is also required',
            'min' => ':attribute not less than :min ky tu',
            'max' => ':attribute not longer than :min ky tu',
        ];
    }
}
