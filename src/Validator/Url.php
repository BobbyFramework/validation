<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class Url extends Validator {

    public function isValid(Validation $validation,$value)
    {
        $value = $validation->getValue($field);

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Url');
            }
      
            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
        }
        return true;
    }
}
