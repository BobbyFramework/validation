<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;

class RequiredValidator extends Validator {

    public function isValid($value)
    {
        return $value != '';
    }
}