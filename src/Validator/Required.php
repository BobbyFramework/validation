<?php

namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Required
 * @package BobbyFramework\Validation\Validator
 */
class Required extends Validator
{
    /**
     * @var bool
     */
    protected $strict = true;

    /**
     * @param Validation $validation
     * @param $field
     * @return bool
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);

        if ($value === null || $value === "") {

            $message = $this->getOption('message');

            if (true === is_null($message)) {
                $message = $validation->getDefaultErrorMessages()->get('Required');
            }

            $validation->appendErrorMessageForValidator(new Error($message, $field));

            return false;
        }
        return true;
    }
}

