<?php
namespace BobbyFramework\Validation;
/**
 * Class ErrorMessagesGroup
 * @package BobbyFramework\Validation
 */
class ErrorMessagesGroup
{
    /**
     * @var $_messages
     */
    protected $_messages;

    /**
     * @param ErrorMessage $message
     */
    public function appendMessage(ErrorMessage $message)
    {
        $this->_messages[] = $message;
    }
}
