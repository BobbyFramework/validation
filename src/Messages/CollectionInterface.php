<?php
namespace BobbyFramework\Validation\Messages;

interface CollectionInterface extends \ArrayAccess, \Countable, \Iterator
{
    public function set($key, $value);
    public function get($key, $default = null);
    public function replace(array $items);
    public function getAll();
    public function has($key);
    public function remove($key);
    public function clear();
}