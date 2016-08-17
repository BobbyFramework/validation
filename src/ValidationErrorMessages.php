<?php
namespace BobbyFramework\Validation;
/**
 * Class ErrorMessage
 * @package BobbyFramework\Validation
 */
class ValidationErrorMessages
{
    /**
     * @var array|null
     */
    protected $_defaultMessages = null;

    /**
     * @var array
     */
    protected $_messages = [];

    /**
     * ValidationErrorMessages constructor.
     * @param null $messages
     */
    public function __construct($messages = null)
    {
        $this->_defaultMessages = [
            'MaxLength' => 'default Message',
            'Required' => 'default Message'
        ];

        if (true === is_array($messages)) {
            $this->set($messages);
        }
    }

    /**
     * @param array $messages
     * @return $this
     */
    public function set(array $messages)
    {
        $this->_messages = array_merge($this->_defaultMessages, $messages);
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