<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SocialSecurityNumber implements Rule
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
        $ssn = implode("", explode($value, "-"));
        $len = strlen($ssn);

        if($len != 10 && $len != 12) {
            return false;
        }

        $skip = 0;
        if($len == 12) {
            $skip = 2;
        }

        $checksum = 0;


        for($i = $skip; $i < $len; $i++) {
            if(!is_numeric($ssn[$i])) {
                return false;
            }
            if($i < $len - 1) {
                $c = intval($ssn[$i]) * (2 - ($i % 2));
                $checksum += intdiv($c, 10);
                $checksum += $c % 10;
            }
        }

        return 10 - ($checksum % 10) == intval($ssn[$len - 1]);
        

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Fel format på personnummer.';
    }
}
