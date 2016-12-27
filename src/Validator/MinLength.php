<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class MinLength extends Validator
{
    public function isValid(Validation $validation, $value)
    {
        if (false === $this->hasOption('minLength')) {
            throw new ValidationException("A minimum or maximum must be set");
        }

        $minLength = $this->getOption('minLength');
        
        $value = $validation->getValue($field);

        if (strlen($value) >= $minLength) {
            return true;
        }

        $message = $this->getOption('message');
        if (true === is_null($message)) {
            $message = $validation->getDefaultErrorMessages()->get('MinLength');
        }

        $validation->appendErrorMessageForValidator(new Error($message, $field), $this);

        return false;
    }
}
