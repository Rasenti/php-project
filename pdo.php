<?php
try {
    //DSN = Data Source Name
    $pdo = new PDO("mysql:host=host.docker.internal;port=3306;dbname=...;charset=uft8mb4, 'username', 'password'");
} catch (PDOException $ex){
    echo "La connexion à la BDD a échoué";
}

var_dump($pdo);

$stmt = $pdo->query("SELECT * FROM products");

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($products);



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