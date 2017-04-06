<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Confirmation
 * @package BobbyFramework\Validation\Validator
 */
class Confirmation extends Validator
{
    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);
        $valueWith = $validation->getValue($this->getOption('with'));

        if ($value != $valueWith) {
            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Confirmation');
            }

            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
            return false;
        }
        return true;
    }
}
