<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class CreateUserRequest extends FormRequest
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
            'username' =>  'required', 'string', 'max:255', 'unique:users',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8',
        ];
    }

    public function messages() {
        return [
            'username.required' => 'username is also required',
            'email.required' => 'username is also required',
            'password.required' => 'username is also required',
            'password.min' => 'password not less than 8 ky tu',
            'email.max' => 'email not longer than 255 ky tu',
        ];
    }
}
