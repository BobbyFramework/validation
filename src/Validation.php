<?php
namespace BobbyFramework\Validation;

use BobbyFramework\Validation\Messages\Error as MessagesError;
use BobbyFramework\Validation\Messages\ErrorCollection as MessagesErrorCollection;

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
     * @return null
     */
    public function getValidators()
    {
        return $this->_validators;
    }

    /**
     * @param $field
     * @param array $validators
     */
    public function setValidators($field, $validators)
    {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator) {
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
            foreach ($field as $validator) {
                if (false === $validator->isValid($this, $fields)) {
                    $return = false;
                    if (true === $validator->isStrict()) {
                        break;
                    }
                }
            }
        }

        return $return;
    }

    /**
     * @param MessagesError $message
     */
    public function appendErrorMessageForValidator(MessagesError $message, $validator)
    {
        $this->_messagesGroup->appendMessage($message, $validator);
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
     * @param $field
     * @param $value
     */
    public function setValue($field, $value)
    {
        $this->_values[$field] = $value;
    }

    /**
     * @param $field
     * @return mixed
     */
    public function getValue($field)
    {
        return $this->_values[$field];
    }
}
