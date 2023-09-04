<?php
require_once 'FormValidator.php';
require_once 'Exceptions/InvalidPasswordConfirmationException.php';

class PasswordValidator extends FormValidator
{
    public function __construct($passwordConfirm)
    {
        prepareField($passwordConfirm);

        return $passwordConfirm;
    }

    public static function validateEmailFormat(string $password,  string $passwordConfirm): void
    {
        if ($password !== $passwordConfirm) {
            throw new InvalidPasswordConfirmationException();
        }
    }
}
