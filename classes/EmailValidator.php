<?php
require_once 'FormValidator.php';
require_once 'Exceptions/InvalidEmailException.php';

class EmailValidator extends FormValidator
{
    public static function validateEmailFormat(string $field): void
    {
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidEmailException();
        }
    }
}
