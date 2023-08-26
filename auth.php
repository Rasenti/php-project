<?php
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'data/users_data.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
  Utils::redirect('login.php?error=' . ErrorCode::LOGIN_FIELDS_REQUIRED);
}

[
  'email' => $email,
  'password' => $password
] = $_POST;
// var_dump($_POST);

// Authentification
if ($email !== "test@gmail.com" || $password !== "test") {
  Utils::redirect('login.php?error=' . ErrorCode::INVALID_CREDENTIALS);
}

// echo "Vous êtes connecté !";

session_start();
$_SESSION['email'] = 'test@gmail.com';
Utils::redirect('login.php');