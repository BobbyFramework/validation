<?php
namespace BobbyFramework\Validation\Messages;

/**
 * Class ErrorMessagesGroup
 * @package BobbyFramework\Validation
 */
class ErrorCollection implements \Countable, \ArrayAccess, \Iterator
{
    /**
     * @var $_messages
     */
    protected $_messages;

    /**
     * @var $_position
     */
    private $_position = 0;

    /**
     * ErrorCollection constructor.
     * @param null $messages
     */
    public function __construct($messages = null)
    {
        if (true === is_array($messages)) {
            $this->setMessages($messages);
        }
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages)
    {
        $this->_messages = $messages;
    }

    /**
     * @param Error $message
     */
    public function appendMessage(Error $message)
    {
        $this->_messages[] = $message;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->getCount();
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->_messages);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->_messages;
    }

    /**
     * @param $offset
     * @param null $defaultValue
     * @return null
     */
    public function get($offset, $defaultValue = null)
    {
        return isset($this->_messages[$offset]) ? $this->_messages[$offset] : $defaultValue;
    }

    /**
     *
     */
    public function rewind()
    {
        $this->_position = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->_messages[$this->_position];
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return $this->_position;
    }

    /**
     *
     */
    public function next()
    {
        $this->_position++;
    }

    /**
     * @return mixed
     */
    public function valid()
    {
        return isset($this->_messages[$this->_position]);
    }

    /**
     *
     */
    public function reverse()
    {
        $this->_messages = array_reverse($this->_messages);
        $this->rewind();
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->_messages[$offset] = $value;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->_messages[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->_messages[$offset]);
    }

    /**
     * @param mixed $offset
     * @return null
     */
    public function offsetGet($offset)
    {
        return isset($this->_messages[$offset]) ? $this->_messages[$offset] : null;
    }

}
