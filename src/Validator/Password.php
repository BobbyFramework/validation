<?php
namespace BobbyFramework\Validation\Validator;

use BobbyFramework\Validation\Messages\Error;
use BobbyFramework\Validation\Validator;
use BobbyFramework\Validation\Validation;

/**
 * Class Password
 * @package BobbyFramework\Validation\Validator
 */
class Password extends Validator
{
    /**
     * Password constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $optionsDefault = [
            'withFigures' => true,
            'withLowercaseLetters' => true,
            'withCapitalLetters' => true,
            'withSpecialCharacters' => true,
            'numberOfCharacters' => 8,
        ];

        $options = array_merge($optionsDefault, $options);

        parent::__construct($options);
    }

    /**
     * @param Validation $validation
     * @param $field
     * @return mixed|void
     */
    public function isValid(Validation $validation, $field)
    {
        $value = $validation->getValue($field);

        $withFigures = $this->getOption('withFigures');
        $withLowercaseLetters = $this->getOption('withLowercaseLetters');
        $withCapitalLetters = $this->getOption('withCapitalLetters');
        $withSpecialCharacters = $this->getOption('withSpecialCharacters');
        $numberOfCharacters = $this->getOption('numberOfCharacters');

        $error = 0;
        if (strlen($value) <= $numberOfCharacters) {
            $messages[] = $this->getErrorMessage("numberOfCharacters", $validation);
            $error++;
        }

        if ($withFigures && !preg_match("#[0-9]+#", $value)) {
            $messages[] = $this->getErrorMessage("number", $validation);
            $error++;
        }

        if ($withCapitalLetters && !preg_match("#[A-Z]+#", $value)) {
            $messages[] = $this->getErrorMessage("capitalLetter", $validation);
            $error++;
        }

        if ($withLowercaseLetters && !preg_match("#[a-z]+#", $value)) {
            $messages[] = $this->getErrorMessage("lowercaseLetter", $validation);
            $error++;
        }

        /*if($withSpecialCharacters && !preg_match("#[~`!@#$%^&*()_-+=\[\]{}\|\\:;\"\'<,>.]#", $value)) {
            $messages[] = $this->getErrorMessage("lowercaseLetter", $validation);
            $error++;
        }*/
        if ($error === 0) {
            return true;
        }

        $validation->appendErrorMessageForValidator(new Error($messages, $field), $this);
    }

    /**
     * @param $key
     * @param $validation
     * @return mixed
     */
    private function getErrorMessage($key, $validation)
    {
        $message = $this->getOption('message')[$key];
        if (true === is_null($message)) {
            $message = $validation->getDefaultErrorMessages()->get('password')[$key];
        }
        return $message;
    }
}

