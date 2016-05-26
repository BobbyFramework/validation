<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class Required extends Validator {

    public function isValid(Validation $validation,$value)
    {
        return $value != '';
    }
}

