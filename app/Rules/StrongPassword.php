<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrongPassword implements Rule
{
    public $error = '';

    public function passes($attribute, $value)
    {
        if (!preg_match('/[A-Z]/', $value)) {
            $this->error = 'Password must contain at least one uppercase letter';
            return false;
        }

        if (!preg_match('/[0-9]/', $value)) {
            $this->error = 'Password must contain at least one number';
            return false;
        }

        if (!preg_match('/[@$!%*?&#]/', $value)) {
            $this->error = 'Password must contain at least one symbol (@$!%*?&#)';
            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->error;
    }
}
