<?php

namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Url
 * @package BobbyFramework\Validation\Validator
 */
class Url extends Validator
{
    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Url');
            }

            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field));
        }

        return true;
    }
}

