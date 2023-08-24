<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "Jonction"; ?></title>
    <link rel="stylesheet" href="/project/assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <header class="container-fluid p-0">

        <div class="navbar p-0">
            <div class="logo_container col-lg-2 col-6 m-0">
                <img class="logo img-fluid" src="/project/uploads/logo.svg" alt="Logo">
            </div>
            <ul class="navitems d-flex col-lg-8">
                <li class="btn_navbar"><a href="/project/index.php">Accueil</a></li>
                <li class="btn_navbar"><a href="/project/encyclopedie.php">Encyclopédie</a></li>
                <li class="btn_navbar"><a href="/project/admin.php">Administration</a></li>
            </ul>
            <div class="button_container col-lg-2 col-6 m-0">
                <a href="/project/connection.php"><button class="connect">Connexion</button></a>
            </div>
        </div>

    </header>