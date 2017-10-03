<?php

namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Alpha
 * @package BobbyFramework\Validation\Validator
 */
class Alpha extends Validator
{
    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);

        if (preg_match('/^([a-z])+$/i', $value) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Alpha');
            }

            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field));

			return false;
        }

        return true;
    }
}
