<?php
require_once __DIR__ . '/../functions/prepareField.php';

abstract class FormValidator
{
    public function __construct(string $field)
    {
        prepareField($field);

        return $field;
    }
}
