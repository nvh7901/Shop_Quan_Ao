<?php

namespace App\Rules\User;

use App\Helper\RegexConstant;
use Illuminate\Contracts\Validation\Rule;

class EmailRule implements Rule
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
        return preg_match(RegexConstant::REGEXEMAIL, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email phải là một địa chỉ email hợp lệ';
    }
}
