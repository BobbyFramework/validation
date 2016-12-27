<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class Regex extends Validator
{
    public function isValid(Validation $validation, $field)
    {
		$value = $validation->getValue($field);

		if (false === $this->hasOption('regex')) {
            throw new ValidationException("A Regex");
        }

		$regex = $this->getOption('regex');

        if (preg_match($regex $value) === false) {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Regex');
            }
      
            //error add Message
            $validation->appendErrorMessageForValidator(new Error($message, $field), $this);
        }
        return true;
    }
}
