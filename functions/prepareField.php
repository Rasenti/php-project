<?php

function prepareField(string $field): string
{
    $field = trim($field);
    $field = stripslashes($field);
    $field = htmlspecialchars($field);

    return $field;
}
