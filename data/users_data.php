<?php
// require_once 'classes/User.php';


//Anciennes données de users en dur avant PDO
// $usersData = [
//     [
//         'id' => 1,
//         'firstname' => 'Alice',
//         'lastname' => 'Dahan',
//         'email' => 'lilice@gmail.com',
//         'pseudo' => 'Lilice',
//         'password' => 'lil',
//         'birthdate' => '1993-02-18',
//         'admin' => false,
//         'subscribed' => false,
//     ],
//     [
//         'id' => 2,
//         'firstname' => 'Alex',
//         'lastname' => 'Delporte',
//         'email' => 'botling@gmail.com',
//         'pseudo' => 'Botling',
//         'password' => 'bot',
//         'birthdate' => '1992-12-11',
//         'admin' => false,
//         'subscribed' => true,
//     ],
//     [
//         'id' => 3,
//         'firstname' => 'Quentin',
//         'lastname' => 'Orias',
//         'email' => 'rasen@gmail.com',
//         'pseudo' => 'Rasen',
//         'password' => 'ras',
//         'birthdate' => '1992-12-10',
//         'admin' => true,
//         'subscribed' => false,
//     ],
//     [
//         'id' => 4,
//         'firstname' => 'Mathieu',
//         'lastname' => 'Sallé',
//         'email' => 'sgoat@gmail.com',
//         'pseudo' => 'sgoat',
//         'password' => 'sgo',
//         'birthdate' => '1992-05-21',
//         'admin' => false,
//         'subscribed' => true,
//     ],
// ];

//Exploration d'utilisation d'une classe pour gérer les users (avant PDO)
// $users = [
//     $lilice = new User ($usersData[0]['id'], $usersData[0]['firstname'], $usersData[0]['lastname'], $usersData[0]['email'], $usersData[0]['pseudo'], $usersData[0]['password'], $usersData[0]['birthdate'], $usersData[0]['admin'], $usersData[0]['subscribed']),
//     $botling = new User ($usersData[1]['id'], $usersData[1]['firstname'], $usersData[1]['lastname'], $usersData[1]['email'], $usersData[1]['pseudo'], $usersData[1]['password'], $usersData[1]['birthdate'], $usersData[1]['admin'], $usersData[1]['subscribed']),
//     $rasen = new User ($usersData[2]['id'], $usersData[2]['firstname'], $usersData[2]['lastname'], $usersData[2]['email'], $usersData[2]['pseudo'], $usersData[2]['password'], $usersData[2]['birthdate'], $usersData[2]['admin'], $usersData[2]['subscribed']),
//     $sgoat = new User ($usersData[3]['id'], $usersData[3]['firstname'], $usersData[3]['lastname'], $usersData[3]['email'], $usersData[3]['pseudo'], $usersData[3]['password'], $usersData[3]['birthdate'], $usersData[3]['admin'], $usersData[3]['subscribed'])
// ];
