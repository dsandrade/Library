<?php

namespace Library\Validators;

use Illuminate\Support\Facades\Validator;

class LoanValidator
{
    public function returned ($attribute, $value, $parameters, $validator)
    {
        return is_null($value);
    }
}