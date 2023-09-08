<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/ErrorCode.php';
require_once __DIR__ . '/../data/datas.php';

// var_dump($_POST['firstname']);
// var_dump($_POST['content']);

// Je commence par valider les champs du formulaire, et fais une redirection avec messages d'erreur le cas échéant
$nameError ="";
$emailError ="";
$dateError ="";
$passwordError ="";

if (!empty($_POST)) { 
    
    try {
        $firstname = FormValidator::validateStringLength($_POST['firstname'], 45);
        $lastname = FormValidator::validateStringLength($_POST['lastname'], 45);
        $pseudo = FormValidator::validateStringLength($_POST['pseudo'], 45);
    } catch (InvalidLengthException $lengthException) {
        $lengthError = $lengthException->getMessage();
        $errors['length'] = $lengthError;
    }

    try {
        $email = FormValidator::validateEmailFormat($_POST['email']);
    } catch (InvalidEmailException $emailException) {
        $emailError = $emailException->getMessage();
        $errors['email'] = $emailError;
    }

    try {    
        $birthdate = FormValidator::validateDateFormat($_POST['birthdate']);
    } catch (InvalidDateException $dateException) {
        $dateError = $dateException->getMessage();
        $errors['date'] = $dateError;
    }

    try {
        $password = FormValidator::validatePasswordMatch($_POST['password'], $_POST['passwordConfirm']);
    } catch (InvalidPasswordConfirmationException $passwordException) {
        $passwordError = $passwordException->getMessage();
        $errors['password'] = $passwordError;
    }

}

// Si au moins un message d'erreur est peuplé on redirige sur le formulaire avec le message d'erreur stocké dans la session
if (!empty($nameError) || !empty($emailError) || !empty($dateError) || !empty($passwordError)) 
{
    session_start();
    $_SESSION['errors'] = $errors;
    Utils::redirect('index.php#newsletter_banner');
}

// Si les champs sont validés on lance la query pour peupler la table des users
$stmt = $pdo->prepare(
    "INSERT INTO users (firstname, lastname, pseudo, birthdate, email, password) VALUES
    (:firstname, :lastname, :pseudo, :birthdate, :email, :password)"
);

$stmt->execute([
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'pseudo' => $_POST['pseudo'],
    'birthdate' => $_POST['birthdate'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
]);

Utils::redirect('/index.php');