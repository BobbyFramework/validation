<?php

ini_set('display_errors','on');
error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Validation\Validation;
use BobbyFramework\Validation\ValidationErrorMessages;
use BobbyFramework\Validation\Validator\Required;
use BobbyFramework\Validation\Validator\Email;

$data = [
    'lastname' => 'Jobs',
	'firstname' => 'steve',
    'email' => 'dsdsqd1@gmail.com'

];

$validationMessageError = new ValidationErrorMessages([
    'Required' => 'Veuillez saisir le champs '
]);

$validation = new Validation($validationMessageError);

	$validation->setValidators('lastname', [
			new Required(),
		]
	);

	$validation->setValidators('firstname', [
			new Required([
				'noValidValue' => [
					'none',
				]
			]),
		]
	);

$validation->setValidators('email', [
        new Required(),
        new Email([
        	'allowEmpty' => true
		])
    ]
);

if (true === $validation->isValid($data)) {
    echo 'validation is ok';
	dump($validation->getValues());
} else {
    echo 'Erreur validation';

    if ($validation->getErrorMessages()->getCount() >= 1) {

        foreach ($validation->getErrorMessages()->getAll() as $message) {
        	/** @var $message \BobbyFramework\Validation\Messages\Error */
            echo '<br/>' . $message->getField() . ' : ' . $message->getMessage();
        }
    }
}
