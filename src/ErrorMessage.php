<?php
namespace BobbyFramework\Validation;
/**
 * Class ErrorMessage
 * @package BobbyFramework\Validation
 */
class ErrorMessage
{
    /**
     * @var
     */
    protected $_message;

    /**
     * ErrorMessage constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->setMessage($message);
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
     * @return mixed
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
