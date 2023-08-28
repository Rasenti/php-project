<?php
require_once __DIR__ . '/../classes/Utils.php';

$pdo = Utils::newPDO();

$stmt = $pdo->query("SELECT * FROM users");
$users = Utils::selectFrom($pdo, 'users');
$categories = Utils::selectFrom($pdo, 'categories');
$pages = Utils::selectFrom($pdo, 'pages');
$images = Utils::selectFrom($pdo, 'images');

// var_dump($categories);

//Comandes SQL pour créer et peupler une table

// CREATE TABLE product (
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(255) NOT NULL,
//     price DECIMAL(7, 2) NOT NULL DEFAULT 50
// ) ENGINE=INNODB;

// INSERT INTO product (name, price) VALUES
// ("test", 56.78),
// ("Bouquin", 12.45),
// ("PC", 586.74),
// ("Verre", 2.5);