<?php
require_once __DIR__ . '/classes/Utils.php';
require_once __DIR__ . '/classes/FormValidator.php';

$test = 'sdffq-10-24';
$date = FormValidator::validateDateFormat($test);
echo $test;
var_dump($date);
