<?php

namespace BobbyFramework\Validation;

use BobbyFramework\Validation\Messages\Error as MessagesError;
use BobbyFramework\Validation\Messages\ErrorCollection as MessagesErrorCollection;
use Closure;

/**
 * Class Validation
 * @package BobbyFramework\Validation
 */
class Validation
{
    /**
     * @var array
     */
    private $_validators = [];

    /**
     * @var MessagesErrorCollection|null
     */
    private $_messagesGroup = null;

    /**
     * @var array
     */
    protected $_values = [];

    /**
     * @var ValidationErrorMessages|null
     */
    protected $_ValidationErrorMessage = null;

    /**
     * Validation constructor.
     * @param ValidationErrorMessages|null $errorMessages
     */
    public function __construct(ValidationErrorMessages $errorMessages = null)
    {
        $this->_ValidationErrorMessage = $errorMessages ?: new ValidationErrorMessages();
        $this->_messagesGroup = new MessagesErrorCollection();
    }

    /**
     * @return array
     */
    public function getValidators()
    {
        return $this->_validators;
    }

    /**
     * @param string $field
     * @param array array $validators
     */
    public function setValidators($field, array $validators)
    {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator) {
                $this->_validators[$field][] = $validator;
            } elseif ($validator instanceof Closure) {
                $this->_validators[$field][] = $validator;
            }
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function isValid($data)
    {
        /**
         * @var Validator $validator
         */
        $this->_values = $data;

        $return = true;

        foreach ($this->_validators as $fields => $field) {
            foreach ($field as $key => $validator) {
                if ($validator instanceof Closure) {
                    $execute = call_user_func($validator, $this, $fields);
                    if (!is_bool($execute)) {
                        throw new \InvalidArgumentException('return function is not bool');
                    }

                    if ($execute === false) {
                        $return = false;
                    }

                } else {
                    if (false === $validator->isValid($this, $fields)) {
                        $return = false;
                        if (true === $validator->isStrict()) {
                            break;
                        }
                    }
                }
            }
        }

        return $return;
    }

    /**
     * @param MessagesError $message
     */
    public function appendErrorMessageForValidator(MessagesError $message)
    {
        $this->_messagesGroup->appendMessage($message);
    }

    /**
     * @return MessagesErrorCollection|null
     */
    public function getErrorMessages()
    {
        return $this->_messagesGroup;
    }

    /**
     * @return \BobbyFramework\Validation\ValidationErrorMessages
     */
    public function getDefaultErrorMessages()
    {
        return $this->_ValidationErrorMessage;
    }

    /**
     * @param string $field
     * @param $value
     */
    public function setValue($field, $value)
    {
        $this->_values[$field] = $value;
    }

    /**
     * @param string $field
     * @param null $defaultValue
     * @return mixed
     */
    public function getValue($field, $defaultValue = null)
    {
        return isset($this->_values[$field]) ? $this->_values[$field] : $defaultValue;
    }
}
