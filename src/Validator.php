<?php
namespace BobbyFramework\Validation;

/**
 * Class Validator
 * @package BobbyFramework\Validation
 */
abstract class Validator
{
    /**
     * @var
     */
    protected $_options = array();

    /**
     * Validator constructor.
     * @param $options
     */
    public function __construct($options)
    {
        $this->setOptions($options);
    }

    /**
     * @param $options
     */
    public function setOptions($options)
    {
        $this->_options = $options;
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasOption($key)
    {
        return isset ($this->_options[$key]);
    }

    /**
     * @param $offset
     * @param null $defaultValue
     * @return null
     */
    public function getOption($offset, $defaultValue = null)
    {
        foreach ($this->_options as $key => $value) {
            if ($offset === $key) {
                return $value;
            }
        }

        return $defaultValue;
    }


    /**
     * @param Validation $validation
     * @param $value
     * @return mixed
     */
    abstract public function isValid(Validation $validation, $value);
}
