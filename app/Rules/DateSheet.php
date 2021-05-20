<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\TimeSheet;
use Illuminate\Support\Facades\Auth;

class DateSheet implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Timesheet::where('user_id', Auth::user()->id)->where('date_create', '=', $value)->count() < 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'not create 2 TimeSheet in day';
    }
}
