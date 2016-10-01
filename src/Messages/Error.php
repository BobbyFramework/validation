<?php
namespace BobbyFramework\Validation\Messages;

use BobbyFramework\Validation\Validator;

/**
 * Class ErrorMessage
 * @package BobbyFramework\Validation
 */
class Error
{
    /**
     * @var string
     */
    protected $_message;

    /**
     * @var string
     */
    protected $_field = null;

    /**
     * Error constructor.
     * @param $message
     * @param $field
     */
    public function __construct($message, $field)
    {
        $this->setMessage($message);
        $this->setField($field);
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @param string $field
     * @return $this
     */
    public function setField($field)
    {
        $this->_field = $field;
        return $this;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->_field;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
