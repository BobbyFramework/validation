<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

class MaxLengthValidator extends Validator
{
    private $_maxLength;

    public function __construct($maxLength)
    {
        parent::__construct();

        $this->setMaxLength($maxLength);
    }

    public function isValid(Validation $validation,$value)
    {
        return strlen($value) <= $this->_maxLength;
    }

    public function setMaxLength($maxLength)
    {
        $maxLength = (int)$maxLength;

        if ($maxLength > 0) {
            $this->_maxLength = $maxLength;
        } else {
            throw new \RuntimeException('< O');
        }
    }
}
