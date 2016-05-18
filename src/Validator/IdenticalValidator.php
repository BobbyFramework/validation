<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;

class IdenticalValidator extends Validator {

    public function isValid($value)
    {
        return false;
    }
}