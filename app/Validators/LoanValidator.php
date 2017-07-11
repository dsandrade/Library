<?php

namespace Library\Validators;

use Illuminate\Support\Facades\Validator;
use Library\Loan;

class LoanValidator
{
    public function returned ($attribute, $value, $parameters, $validator)
    {
        $returned = Loan::find($value);
        $returned = $returned->returned_at;
        return is_null($returned);
    }

    public function canceled ($attribute, $value, $parameters, $validator)
    {
        $canceled = Loan::find($value);
        $canceled = $canceled->canceled_at;
        return is_null($canceled);
    }
}