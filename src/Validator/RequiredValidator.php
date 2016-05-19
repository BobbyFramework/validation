<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class RequiredValidator extends Validator {

    public function isValid(Validation $validation,$value)
    {
        return $value != '';
    }
}
