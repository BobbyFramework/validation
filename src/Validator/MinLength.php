<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\ValidationException;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class MinLength
 * @package BobbyFramework\Validation\Validator
 */
class MinLength extends Validator
{
    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     * @throws ValidationException
     */
    public function isValid(Validation $validation, $field)
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

