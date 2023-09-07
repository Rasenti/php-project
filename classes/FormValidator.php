<?php
require_once 'Exceptions/InvalidDateException.php';
require_once 'Exceptions/InvalidEmailException.php';
require_once 'Exceptions/InvalidPasswordConfirmationException.php';
require_once 'Exceptions/InvalidLengthException.php';

/**
 * FormValidator class
 */
abstract class FormValidator
{
    /**
     * Prepare inputs for validation
     *
     * @param string $field - String input to prepare for validation
     * @return string - string prepared for further testing
     */
    private static function prepareField(string $field): string
    {
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);

        return $field;
    }

    /**
     * Check max length for a string
     *
     * @param string $field - User input, field to check
     * @param integer $maxLength - max authorized length for the field
     * @return void
     * @throws InvalidLengthException - on fail
     */
    public static function validateStringLength(string $field, int $maxLength): void
    {
        $field = self::prepareField($field);
        if (strlen($field) > $maxLength) {
            throw new InvalidLengthException($maxLength);
        }
    }

    /**
     * Check if email format is valid
     *
     * @param string $field - User input, field to check
     * @return void
     * @throws InvalidEmailException - on fail
     */
    public static function validateEmailFormat(string $field): void
    {
        $field = self::prepareField($field);
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidEmailException();
        }
    }

    /**
     * Check if date format is valid
     *
     * @param string $field - User input, field to check
     * @return void
     * @throws InvalidDateException - on fail
     */
    public static function validateDateFormat(string $field): void
    {
        $field = self::prepareField($field);
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

    /**
     * Check password match with the confirmation
     *
     * @param string $password - User input, field to check for match
     * @param string $confirmPassword - second input for matching check
     * @return void
     * @throws InvalidPasswordConfirmationException - on fail
     */
    public static function validatePasswordMatch(string $password, string $confirmPassword): void
    {
        $password = self::prepareField($password);
        $confirmPassword = self::prepareField($confirmPassword);
        if ($password !== $confirmPassword) {
            throw new InvalidPasswordConfirmationException();
        }
    }
}
