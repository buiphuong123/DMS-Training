<?php

namespace App\Http\Requests\TimeSheet;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DateSheet;

class CreateSheetRequest extends FormRequest
{
    /**sr
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
            'name' => 'required', 'string', 'max:255',
            'plan' => 'required', 'string', 'max:255',
            'date_create' => ['required', new DateSheet()],
        ];
    }
    public function messages() {
        return [
            'name.required' => 'name is also required',
            'plan.required' => 'plan is also required',
        ];
    }
}


