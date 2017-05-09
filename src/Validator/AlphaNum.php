<?php

namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class AlphaNum
 * @package BobbyFramework\Validation\Validator
 */
class AlphaNum extends Validator
{
    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);

        if (preg_match('/^([a-z0-9])+$/i', $value) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('AlphaNum');
            }

            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field));
        }
        return true;
    }
}
