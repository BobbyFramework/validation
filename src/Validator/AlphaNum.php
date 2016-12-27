<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class AlphaNum extends Validator
{
    public function isValid(Validation $validation ,$value)
    {
        $value = $validation->getValue($field);

        if (preg_match('/^([a-z0-9])+$/i', $value) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('AlphaNum');
            }
      
            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
        }
        return true;
    }
}
