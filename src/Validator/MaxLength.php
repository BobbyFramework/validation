<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\ValidationException;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class MaxLength
 * @package BobbyFramework\Validation\Validator
 */
class MaxLength extends Validator
{

    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     * @throws \Exception
     */
    public function isValid(Validation $validation, $field)
    {
        if (false === $this->hasOption('maxLength')) {
            throw new ValidationException("A minimum or maximum must be set");
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

        $validation->appendErrorMessageForValidator(new Error($message, $field), $this);

        return false;
    }
}
