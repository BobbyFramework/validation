<?php
namespace BobbyFramework\Validation;

class Validation
{
    private $_validators = null;

    public function getValidators()
    {
        return $this->_validators;
    }

    public function setValidators(array $validators)
    {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator && !in_array($validator, $this->_validators)) {
                $this->_validators[] = $validator;
            }
        }
    }

    public function isValid()
    {
        foreach ($this->_validators as $field => $validator) {
            if (false === $validator->isValid(this,$field)) {
                return false;
            }
        }

        return true;
    }
}
