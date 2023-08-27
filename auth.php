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

foreach ($usersData as $el){
    if ($el['email'] === $email && $el['password'] === $password) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['pseudo'] = $el['pseudo'];
        $_SESSION['admin'] = $el['admin'];
        Utils::redirect('admin.php');
    } 
};

Utils::redirect('login.php?error=' . ErrorCode::INVALID_CREDENTIALS);