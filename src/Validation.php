<?php

namespace BobbyFramework\Validation;

use BobbyFramework\Validation\Messages\Error as MessagesError;
use BobbyFramework\Validation\Messages\ErrorCollection as MessagesErrorCollection;
use Closure;

/**
 * Class Validation
 * @package BobbyFramework\Validation
 */
class Validation
{
	/**
	 * @var array
	 */
	private $validators = [];

	/**
	 * @var MessagesErrorCollection|null
	 */
	private $messagesGroup = null;

	/**
	 * @var array
	 */
	protected $values = [];

	/**
	 * @var ValidationErrorMessages|null
	 */
	protected $validationErrorMessage = null;

	/**
	 * Validation constructor.
	 *
	 * @param ValidationErrorMessages|null $errorMessages
	 */
	public function __construct(ValidationErrorMessages $errorMessages = null)
	{
		$this->validationErrorMessage = $errorMessages ? : new ValidationErrorMessages();
		$this->messagesGroup = new MessagesErrorCollection();
	}

	/**
	 * @return array
	 */
	public function getValidators()
	{
		return $this->validators;
	}

	/**
	 * @param string $field
	 * @param        array array $validators
	 */
	public function setValidators($field, array $validators)
	{
		foreach ($validators as $validator) {
			if ($validator instanceof Validator) {
				$this->validators[$field][] = $validator;
			} elseif ($validator instanceof Closure) {
				$this->validators[$field][] = $validator;
			}
		}
	}

	/**
	 * @param $data
	 *
	 * @return bool
	 */
	public function isValid($data)
	{
		/**
		 * @var Validator $validator
		 */
		$this->values = $data;

		$return = true;

		foreach ($this->validators as $fields => $field) {

			foreach ($field as $key => $validator) {

				/**
				 * Call internal validations, if it returns true, then skip the current validator
				 */
				if ($this->preChecking($fields, $validator)) {
					continue;
				}

				if (false === $validator->isValid($this, $fields)) {
					$return = false;
					if (true === $validator->isStrict()) {
						break;
					}
				}
			}
		}

		return $return;
	}

	/**
	 * @param $fields
	 * @param $validator
	 *
	 * @return bool
	 */
	public function preChecking($fields, $validator)
	{
		$allowEmpty = $validator->getOption("allowEmpty", false);

		if ($allowEmpty) {
			$value = $this->getValue($fields);
			return empty($value);
		}

		return false;
	}

	/**
	 * @param MessagesError $message
	 */
	public function appendErrorMessageForValidator(MessagesError $message)
	{
		$this->messagesGroup->appendMessage($message);
	}

	/**
	 * @return MessagesErrorCollection|null
	 */
	public function getErrorMessages()
	{
		return $this->messagesGroup;
	}

	/**
	 * @return \BobbyFramework\Validation\ValidationErrorMessages
	 */
	public function getDefaultErrorMessages()
	{
		return $this->validationErrorMessage;
	}

	/**
	 * @param string $field
	 * @param        $value
	 */
	public function setValue($field, $value)
	{
		$this->values[$field] = $value;
	}

	/**
	 * @param string $field
	 * @param null   $defaultValue
	 *
	 * @return mixed
	 */
	public function getValue($field, $defaultValue = null)
	{
		return isset($this->values[$field]) ? $this->values[$field] : $defaultValue;
	}

	/**
	 * @return array
	 */
	public function getValues()
	{
		return $this->values;
	}
}
