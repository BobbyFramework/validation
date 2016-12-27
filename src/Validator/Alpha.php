<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class Alpha extends Validator
{
    public function isValid(Validation $validation ,$value)
    {
        $value = $validation->getValue($field);

        if (preg_match('/^([a-z])+$/i', $value) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Alpha');
            }
      
            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
        }
        return true;
    }
}
