<?php

class FormValidator
{
    private static function prepareField(string $field): string
    {
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);

        return $field;
    }

    public static function validateEmailFormat(string $field): void
    {
        $field = self::prepareField($field);
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("Le format de l'email est incorrect");
        }
    }

    public static function validateDateFormat(string $field): void
    {
        $field = self::prepareField($field);
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $field)) {
            throw new InvalidArgumentException("Le format de la date est incorrect");
        }
        $date = explode("-", $field);
        $date[0] = intval($date[0]);
        $date[1] = intval($date[1]);
        $date[2] = intval($date[2]);

        if (!checkdate($date[1], $date[2], $date[0])) {
            throw new InvalidArgumentException("Le format de la date est incorrect");
        }
    }

    public static function validatePasswordMatch(string $password, string $confirmPassword): void
    {
        $password = self::prepareField($password);
        $confirmPassword = self::prepareField($confirmPassword);
        if ($password !== $confirmPassword) {
            throw new InvalidArgumentException("Les mots de passe ne correspondent pas");
        }
    }
}
