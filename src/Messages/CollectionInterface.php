<?php
namespace BobbyFramework\Validation\Messages;

/**
 * Interface CollectionInterface
 * @package BobbyFramework\Validation\Messages
 */
interface CollectionInterface extends \ArrayAccess, \Countable, \Iterator
{
    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param array $items
     * @return mixed
     */
    public function replace(array $items);

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $key
     * @return mixed
     */
    public function has($key);

    /**
     * @param $key
     * @return mixed
     */
    public function remove($key);

    /**
     * @return mixed
     */
    public function clear();
}
