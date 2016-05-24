<?php
namespace BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;
class AlphaValidator extends Validator {
    public function isValid(Validation $validation ,$value)
    {
        return false;
    }
}
