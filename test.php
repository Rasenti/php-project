<?php
require_once __DIR__ . '/classes/Utils.php';

$pdo = Utils::newPDO();
var_dump(Utils::selectFrom($pdo, 'categories'));