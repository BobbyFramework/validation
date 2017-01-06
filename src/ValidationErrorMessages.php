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
    protected $defaultMessages = [];

    /**
     * @var array $messages
     */
    protected $messages = [];

    /**
     * ValidationErrorMessages constructor.
     * @param array $messages
     */
    public function __construct(array $messages = [])
    {
        $this->defaultMessages = [
            'MaxLength' => 'default Message',
            'Required' => 'default Message',
            'Email' => 'default Message',
            'Password' => 'default Message',
        ];

        $this->messages = $this->defaultMessages;

        $this->setMessages($messages);
    }

    /**
     * @param array $messages
     * @return $this
     */
    public function setMessages(array $messages)
    {
        $this->messages = array_merge($this->messages, $messages);
        return $this;
    }

    /**
     * @param $keyValidator
     * @param null $defaultValue
     * @return null
     */
    public function get($keyValidator, $defaultValue = null)
    {
        return isset($this->messages[$keyValidator]) ? $this->messages[$keyValidator] : $defaultValue;
    }
}
