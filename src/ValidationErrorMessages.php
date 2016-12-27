<?php
namespace BobbyFramework\Validation;
/**
 * Class ErrorMessage
 * @package BobbyFramework\Validation
 */
class ValidationErrorMessages
{
    /**
     * @var array
     */
    protected $_defaultMessages = [];

    /**
     * @var array
     */
    protected $_messages = [];

    /**
     * ValidationErrorMessages constructor.
     * @param null $messages
     */
    public function __construct(array $messages = [])
    {
        $this->_defaultMessages = [
            'MaxLength' => 'default Message',
            'Required' => 'default Message',
            'Email' => 'default Message',
            'Password' => 'default Message',
        ];

        $this->_messages = $this->_defaultMessages;

        $this->set($messages);
    }

    /**
     * @param array $messages
     * @return $this
     */
    public function set(array $messages)
    {
        $this->_messages = array_merge($this->_messages,$messages);
        return $this;
    }

    /**
     * @param $keyValidator
     * @param null $defaultValue
     * @return null
     */
    public function get($keyValidator, $defaultValue = null)
    {
        return isset($this->_messages[$keyValidator]) ? $this->_messages[$keyValidator] : $defaultValue;
    }
}