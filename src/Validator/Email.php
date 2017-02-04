<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Email
 * @package BobbyFramework\Validation\Validator
 */
class Email extends Validator
{
    /**
     * @param Validation $validation
     * @param $field
     * @return mixed|void
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);

        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Email');
            }

            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field), $this);

            return false;
        }
        return true;
    }
}

