<?php
namespace BobbyFramework\Validation;
/**
 * Class MessagesGroup
 * @package BobbyFramework\Validation
 */
class MessagesGroup
{
    /**
     * @var $_messages
     */
    protected $_messages;

    /**
     * @param Message $message
     */
    public function appendMessage(Message $message)
    {
        $this->_messages[] = $message;
    }
}
