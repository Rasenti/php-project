<?php
try {
    //DSN = Data Source Name
    //192.168.100.131
    $pdo = new PDO("mysql:host=host.docker.internal;port=3306;dbname=php_project;charset=utt8mb4", 'root', '');
} catch (PDOException){
    echo "La connexion à la BDD a échoué";
    exit;
}
var_dump($pdo);

$stmt = $pdo->query("SELECT * FROM users");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($users);

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