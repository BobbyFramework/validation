<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class EmailValidator extends Validator{

    public function isValid(Validation $validation,$value)
    {
        return false;
    }
}
