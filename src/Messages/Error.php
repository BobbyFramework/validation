<?php
namespace BobbyFramework\Validation\Messages;
/**
 * Class ErrorMessage
 * @package BobbyFramework\Validation
 */
class Error
{
    /**
     * @var
     */
    protected $_message;

    /**
     * @var
     */
    protected $_field = null;

    /**
     * Error constructor.
     * @param $message
     * @param null $field
     */
    public function __construct($message, $field = null)
    {
        $this->setMessage($message);
        $this->setField($field);
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @param $field
     * @return $this
     */
    public function setField($field)
    {
        $this->_field = $field;
        return $this;
    }

    /**
     * @return null
     */
    public function getField()
    {
        return $this->_field;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
