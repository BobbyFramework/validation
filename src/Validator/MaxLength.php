<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class MaxLength extends Validator
{
    public function isValid(Validation $validation, $field)
    {
        if (false === $this->hasOption('maxLength')) {
            throw new \Exception("A minimum or maximum must be set");
        }

        $maxLength = $this->getOption('maxLength');
        if ($maxLength < 0) {
            throw new \RuntimeException('< O');
        }

        $value = $validation->getValue($field);

        if (strlen($value) <= $maxLength) {
            return true;
        }

        $message = $this->getOption('message');
        if (true === is_null($message)) {
            $message = $validation->getDefaultErrorMessages()->get('MaxLength');
        }

        $validation->appendErrorMessage(new Error($message, $field));

        return false;
    }
}