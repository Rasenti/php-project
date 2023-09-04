<?php
require_once 'FormValidator.php';
require_once 'Exceptions/InvalidLengthException.php';

class StringValidator extends FormValidator
{
    public function __construct($maxLength)
    {
        prepareField($maxLength);

        return $maxLength;
    }

    public static function validateEmailFormat(string $field, int $maxLength): void
    {
        if (strlen($field) > $maxLength) {
            throw new InvalidLengthException($maxLength);
        }
    }
}
