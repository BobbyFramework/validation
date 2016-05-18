<?php
namespace BobbyFramework\Validation;

abstract class Validator {

  abstract public function isValid($value);
}