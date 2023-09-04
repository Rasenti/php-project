<?php
require_once 'index.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'data/datas.php';

// var_dump($_POST['firstname']);
// var_dump($_POST['content']);
// if (!empty($_POST)) {
//     require_once 'classes/FormValidator.php';
//     require_once 'classes/StringValidator.php';
//     require_once 'classes/EmailValidator.php';
//     require_once 'classes/DateValidator.php';
//     require_once 'classes/PasswordValidator.php';
    
    // try {
    //     $firstname = new StringValidator($_POST['firstname'], 45);
    //     $lastname = new StringValidator($_POST['lastname'], 45);
    //     $pseudo = new StringValidator($_POST['pseudo'], 45);
    // } catch (InvalidArgumentException $lengthException) {
    //     $lengthError = $lengthException->getMessage();
    // }

    // try {
    //     $email = new EmailValidator($_POST['email']);
    // } catch (InvalidArgumentException $emailException) {
    //     $emailError = $emailException->getMessage();
    // }

    // try {
    //     $birthdate = new DateValidator($_POST['birthdate']);
    // } catch (InvalidArgumentException $dateException) {
    //     $dateError = $dateException->getMessage();
    // }

    // try {
    //     $password = new PasswordValidator($_POST['password'], $_POST['passwordConfirm']);
    //     Utils::redirect('subscribe.php');
    // } catch (InvalidArgumentException $passwordException) {
    //     $passwordError = $passwordException->getMessage();
    // }
    
    // if (!empty($lengthError) || !empty($emailError) || !empty($dateError) || !empty($passwordError)) {
    //     echo "error";
    //     exit;
    // }
    // Utils::redirect('subscribe.php');
// }

$stmt = $pdo->prepare(
    "INSERT INTO users (firstname, lastname, pseudo, birthdate, email, password) VALUES
    (:firstname, :lastname, :pseudo, :birthdate, :email, :password)"
);

$stmt->execute([
    'firstname' => $firstname,
    'lastname' => $lastname,
    'pseudo' => $pseudo,
    'birthdate' => $birthdate,
    'email' => $email,
    'password' => $password, PASSWORD_DEFAULT
]);

Utils::redirect('index.php');