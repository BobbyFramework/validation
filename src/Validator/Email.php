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
        //return true;

        $message = $this->getOption('message');
        if (true === is_null($message)) {
            $message = $validation->getDefaultErrorMessages()->get('email');
        }

        //error add Message
        $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
    }
}
