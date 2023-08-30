<?php
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'data/datas.php';

// var_dump($_POST['firstname']);
// var_dump($_POST['content']);



$stmt = $pdo->prepare(
    "INSERT INTO users (firstname, lastname, pseudo, dob, email, password) VALUES
    (:firstname, :lastname, :pseudo, :dob, :email, :password)"
);

$stmt->execute([
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'pseudo' => $_POST['pseudo'],
    'dob' => $_POST['dob'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

Utils::redirect('index.php');