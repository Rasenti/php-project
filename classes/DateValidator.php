<?php
require_once 'FormValidator.php';
require_once 'Exceptions/InvalidDateException.php';

class DateValidator extends FormValidator
{
    public static function validateEmailFormat(string $field): void
    {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $field)) {
            throw new InvalidDateException();
        }
        $date = explode("-", $field);
        $date[0] = intval($date[0]);
        $date[1] = intval($date[1]);
        $date[2] = intval($date[2]);

        if (!checkdate($date[1], $date[2], $date[0])) {
            throw new InvalidDateException();
        }
    }
}
