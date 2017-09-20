<?php

namespace BobbyFramework\Validation\Messages;

/**
 * Class ErrorMessagesGroup
 * @package BobbyFramework\Validation
 */
class ErrorCollection implements CollectionInterface
{
    /**
     * @var $messages
     */
    protected $messages = [];

    /**
     * @var $position
     */
    private $position = 0;

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
        $this->messages = $messages;
    }

    /**
     * @param Error $message
     */
    public function appendMessage(Error $message)
    {
        $this->messages[$message->getField()] = $message;
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
        return count($this->messages);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->messages;
    }

    /**
     * @param $key
     * @param $value
     * @return $this|mixed
     */
    public function set($key, $value)
    {
        $this->messages[$key] = $value;

        return $this;
    }
    /**
     * @param $offset
     * @param null $defaultValue
     * @return null
     */
    public function get($offset, $defaultValue = null)
    {
        return $this->has($offset) ? $this->messages[$offset] : $defaultValue;
    }

    /**
     * Add item to collection
     *
     * @param array $items Key-value array of data to append to this collection
     * @return mixed|void
     */
    public function replace(array $items)
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
    * Does this collection have a given key?
    *
    * @param string $key The data key
    *
    * @return bool
    */
    public function has($key)
    {
        return array_key_exists($key, $this->messages);
    }
    /**
     *
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->messages[$this->position];
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return $this->position;
    }

    /**
     *
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * @return mixed
     */
    public function valid()
    {
        return isset($this->messages[$this->position]);
    }

    /**
     *
     */
    public function reverse()
    {
        $this->messages = array_reverse($this->messages);
        $this->rewind();
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset,$value);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * @param mixed $offset
     * @return null
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Remove item from collection
     *
     * @param string $key The message key
     */
    public function remove($key)
    {
        unset($this->messages[$key]);
    }

    /**
     * Remove all items from collection
     */
    public function clear()
    {
        $this->messages = [];
    }

    /**
    * Get collection keys
    *
    * @return array The collection's source message keys
    */
    public function keys()
    {
        return array_keys($this->messages);
    }
}
