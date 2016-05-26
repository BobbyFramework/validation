<?php
namespace BobbyFramework\Validation;

/**
 * Class Validation
 * @package BobbyFramework\Validation
 */
class Validation
{
    /**
     * @var null
     */
    private $_validators = null;
    /**
     * @var ErrorMessagesGroup|null
     */
    private $_messagesGroup = null;

    /**
     * @var array
     */
    protected $_values = array();

    /**
     * @var null
     */
    protected $_defaultMessages = null;


    public function __construct($errorMessages = array())
    {
        $this->setDefaultErrorMessages($errorMessages);
        $this->_messagesGroup = new ErrorMessagesGroup();
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
     * @return bool
     */
    public function isValid($data)
    {
        $this->_values = &$data;

        $return = true;
        foreach ($this->_validators as $fields => $field) {
             foreach ($field as $validator) {
                if (false === $validator->isValid($this, $field)) {
                    $return = false;
                }
             }
        }

        return $return;
    }

    /**
     * @param ErrorMessage $message
     */
    public function appendErrorMessage(ErrorMessage $message)
    {
        $this->_messagesGroup->appendMessage($message);
    }

    /**
     * @return ErrorMessagesGroup|null
     */
    public function getErrorMessage()
    {
        return $this->_messagesGroup;
    }

    /**
     * @param array|null $messages
     * @return array|null
     */
    public function setDefaultErrorMessages(array $messages = null)
    {

        $defaultMessages = [
            'MaxLength' => 'default Message',
        ];

        $this->_defaultMessages = array_merge($defaultMessages, $messages);
        return $this->_defaultMessages;
    }

    /**
     * @return null
     */
    public function getDefaultErrorMessages()
    {
        return $this->_defaultMessages;
    }

    /**
     * @param $keyValidator
     * @return bool
     */
    public function getDefaultErrorMessage($keyValidator)
    {
        return isset($this->_defaultMessages[$keyValidator]);
    }

    /**
     * @param $field
     * @param $value
     */
    public function setValue($field,$value)
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
