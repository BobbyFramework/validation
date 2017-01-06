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
    protected $message = '';

    /**
     * @var string|null
     */
    protected $field = null;

    /**
     * Error constructor.
     * @param string $message
     * @param null $field
     */
    public function __construct($message = '', $field = null)
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
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string|null $field
     * @return $this
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
