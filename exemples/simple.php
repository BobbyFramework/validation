<?php


define('APP_PATH', realpath('..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Validation\Validation;


$data = array(
    'name' => 'ndqndqlsdqjskd'
);

$validation = new Validation();

$validation->setValidators('name', array(
        new \BobbyFramework\Validation\Validator\MaxLengthValidator(array(
                'message' => 'max length Error  '
            )
        ),
    )
);

if (true === $validation->isValid($data)) {
    echo 'valide';
} else {
    var_dump($validation->getDefaultErrorMessages());
}


