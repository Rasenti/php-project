<?php
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'data/datas.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
  Utils::redirect('login.php?error=' . ErrorCode::LOGIN_FIELDS_REQUIRED);
}

[
  'email' => $email,
  'password' => $password
] = $_POST;
// var_dump($_POST);

foreach ($users as $el){
    if ($el['email'] === $email && password_verify($password, $el['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['pseudo'] = $el['pseudo'];
        $_SESSION['admin'] = $el['admin'];

        if (isset ($_SESSION['admin']) && $_SESSION['admin'] === 1) {
          Utils::redirect('admin.php');
        }
        Utils::redirect('encyclopedie.php');
    } 
};

Utils::redirect('login.php?error=' . ErrorCode::INVALID_CREDENTIALS);