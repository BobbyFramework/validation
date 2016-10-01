<?php
namespace BobbyFramework\Validation;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class Validator
 * @package BobbyFramework\Validation
 */
abstract class Validator
{
    /**
     * @var bool $strict
     */
    protected $strict = false;
    /**
     * @var array $options
     */
    protected $options = [];

    /**
     * Validator constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->setOptions($options);
    }

    /**
     * @param $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasOption($key)
    {
        return isset ($this->options[$key]);
    }

    /**
     * @param $offset
     * @param null $defaultValue
     * @return null
     */
    public function getOption($offset, $defaultValue = null)
    {
        foreach ($this->options as $key => $value) {
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

    /**
     * @param bool $strict
     */
    public function setStrict($strict)
    {
        if (false === is_bool($strict)) {
            throw new \InvalidArgumentException('Strict is invalid');
        }
        $this->strict = $strict;
    }

    /**
     * @return bool
     */
    public function isStrict()
    {
        return $this->strict;
    }
}
