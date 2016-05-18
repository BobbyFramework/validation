<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;

class EmailValidator extends Validator{

    public function isValid($value)
    {
        return false;
    }
}