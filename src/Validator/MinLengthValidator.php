<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Validator;

class MinLengthValidator extends Validator
{
    private $_minLength;

    public function __construct($minLength)
    {
        parent::__construct();

        $this->setMinLength($minLength);
    }

    public function isValid($value)
    {
        return strlen($value) <= $this->_minLength;
    }

    public function setMinLength($minLength)
    {
        $minLength = (int)$minLength;

        if ($minLength > 0) {
            $this->_minLength = $minLength;
        } else {
            throw new \RuntimeException('< O');
        }
    }
}