<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Password
 * @package BobbyFramework\Validation\Validator
 */
class Password extends Validator
{

    /**
     * @param Validation $validation
     * @param $field
     * @return mixed|void
     */
    public function isValid(Validation $validation, $field)
    {
        $message = $this->getOption('message');
        if (true === is_null($message)) {
            $message = $validation->getDefaultErrorMessages()->get('Password');
        }

        $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
    }
}
