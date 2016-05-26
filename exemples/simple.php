<?php

define('APP_PATH', realpath('..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Validation\Validation;
use BobbyFramework\Validation\ValidationErrorMessages;
use BobbyFramework\Validation\Validator\MaxLength;

$data = array(
    'name' => 'Steve Jobs'
);

$validation = new Validation(new ValidationErrorMessages([
    'MaxLength' => 'MaxLength Error  '
]));

$validation->setValidators('name', array(
        new MaxLength(array(
                'maxLength' => 2
            )
        ),
    )
);

if (true === $validation->isValid($data)) {
    echo 'valide';
} else {
    if ($validation->getErrorMessages()->getCount()) {
        foreach ($validation->getErrorMessages() as $message) {
            echo '<br/>' . $message->getField() . ' : ' . $message->getMessage();
        }
    }
}


