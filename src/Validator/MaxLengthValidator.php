<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\ErrorMessage;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class MaxLengthValidator extends Validator
{
    public function isValid(Validation $validation, $field)
    {
        if (!$this->hasOption('maxLength')) {
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

        $validation->appendErrorMessage(new ErrorMessage($validation->getDefaultErrorMessage('MaxLength')));

        return false;
    }
}