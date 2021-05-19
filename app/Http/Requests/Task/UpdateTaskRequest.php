<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'infomation' => 'required',
            'time' => 'required',
        ];
    }

    public function messages() {
        return [
            'infomation.required' => 'infomation is also required',
            'time.required' => 'time is also required',
        ];
    }
}
